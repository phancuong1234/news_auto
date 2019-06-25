<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EditNewsRequest;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Upload;

class NewsController extends Controller
{
    use Upload;
    # return view index of news
    public function index()
    {
        $listNews = News::where('is_active', config('setting.is_active.active'))->paginate(config('setting.paginate'));

        return view('admin_page.news.index', compact('listNews'));
    }
    # return view add news
    public function create()
    {
        $idCategory = Category::pluck('name_category', 'id');

        return view('admin_page.news.add', compact('idCategory'));
    }
    # function add news
    public function store(NewsRequest $request)
    {
        $input = $request->all();
        $input['id_user'] = 1;
        if (isset($input['image'])){
            $input['image'] = $this->saveImg($input['image'], '/images/news/'); # save img to local
        }
        $status = News::create($input);

        if($status){

            return redirect()->route('news.index')->with('messageSuccess', trans('messages.news.add.success'));
        } else {

            return redirect()->route('news.index')->with('messageFail', trans('messages.news.add.fail'));
        }
    }

    # return view edit news
    public function show($id)
    {
        $news = News::where(['id' => $id, 'is_active' => config('setting.is_active.active')])->first();
        $idCategory = Category::pluck('name_category', 'id');

        return view('admin_page.news.edit', compact('news', 'idCategory'));
    }

    public function edit($id)
    {
        //
    }
    # function update news
    public function update(EditNewsRequest $request, $id)
    {
        $input = $request->all();
        $input['id_user'] = 1;
        unset($input['_method'], $input['_token']); #  loại bỏ 2 input token và method
        if (isset($input['image'])){
            $input['image'] = $this->saveImg($input['image'], '/images/news/'); # save img to local
        }
        $status = News::where('id', $id)->update($input);

        if($status){

            return redirect()->route('news.index')->with('messageSuccess', trans('messages.news.edit.success'));
        } else {

            return redirect()->route('news.index')->with('messageFail', trans('messages.news.edit.fail'));
        }

    }
    # function delete new
    public function destroy($id)
    {
        try {
            News::find($id)->delete();

            return redirect()->route('news.index')->with('messageSuccess', trans('messages.news.del.success'));
        }
        catch (Exception $exception)
        {
            return redirect()->route('news.index')->with('messageFail', trans('messages.news.del.fail'));
        }
    }

    # live search by ajax . return result of search by the title or id or id_user
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $listNews = News::where('title', 'LIKE', "%{$text}%")
                ->orWhere('id', 'LIKE', "%{$text}%")
                ->orWhere('id_user', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.news.search', compact('listNews'));
        }
    }
}

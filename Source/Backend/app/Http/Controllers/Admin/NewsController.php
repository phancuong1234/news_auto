<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EditNewsRequest;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
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
        $id = Auth::user()->id;
        $role = Auth::user()->id_role;
        if($role == config("setting.role.editor")){
            $listNews = News::where('is_active', config('setting.is_active.active'))
                            ->where('id_user',$id)
                            ->paginate(config('setting.paginate'));
        }
        else{
            $listNews = News::where('is_active', config('setting.is_active.active'))->paginate(config('setting.paginate'));
        }
        return view('admin_page.news.index', compact('listNews'));
    }
    #pending page
    public function pendingIndex()
    {
        $listNews = News::where('is_active', '!=', config('setting.is_active.active'))
            ->paginate(config('setting.paginate'));

        return view('admin_page.news.pending', compact('listNews'));
    }
    #approve news
    public function approve($id){
        try {
            News::find($id)->update(['is_active' => config('setting.is_active.active')]);

            return redirect()->route('news.index')->with('messageSuccess', trans('messages.news.approve.success'));
        }
        catch (Exception $exception)
        {
            return redirect()->route('news.index')->with('messageFail', trans('messages.news.approve.fail'));
        }
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
        $id_login = Auth::user()->id;
        $id_user_new = News::where(['id' => $id])->first()->id_user;
        if($id_login != $id_user_new ){
            $this->authorize("editor");
        }
        else{
            $news = News::where(['id' => $id])->first();
            $idCategory = Category::pluck('name_category', 'id');
            $typeURL = $this->explodeStr($news->image);
           
            return view('admin_page.news.edit', compact('news', 'idCategory', 'typeURL'));
        }
        
    }
    #explode string
    public function explodeStr($str)
    {
        $arrURL = explode('/', $str);
        if(in_array(config('setting.URL_image.url_crawl_dantri'), $arrURL)){
            $typeURL = config('setting.URL_image.type_url.crawl');
        }
        else {
            $typeURL = config('setting.URL_image.type_url.of_server');
        }

        return $typeURL;
    }
    #pending_preview
    public function pendingPreview($id, $typePreview)
    {
        $news = News::where(['id' => $id])->first();
        $typeURL = $this->explodeStr($news->image);

        return view('admin_page.news.preview_news', compact('news', 'typeURL', 'typePreview'));
    }
    public function edit($id)
    {
        //
    }
    # function update news
    public function update(EditNewsRequest $request, $id)
    {
        $input = $request->all();
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
    public function getSearchAjax($text, $typeRQ)
    {
        $data = [];
        if($typeRQ == config('setting.search_by.pending')){
            $listPending = News::where('is_active', '=', config('setting.is_active.pending'))->get();
            if($listPending->count() > 0){
                foreach($listPending as $key => $value){
                    array_push($data, $value->id);
                }
            }
        }
        else {
            $listPending = News::where('is_active', '=', config('setting.is_active.active'))->get();
            if($listPending->count() > 0){
                foreach($listPending as $key => $value){
                    array_push($data, $value->id);
                }
            }
        }
        if(isset($text))
        {
            $listNews = News::whereIn('id', $data)
                ->where('title', 'LIKE', "%{$text}%")
                ->orWhere('id_user', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.news.search', compact('listNews'));
        }
    }
}

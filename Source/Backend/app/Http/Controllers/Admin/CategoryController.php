<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    # return index category view
    public function index()
    {
        $listCategories = Category::where('is_active', config('setting.is_active.active'))->paginate(config('setting.paginate'));

        return view('admin_page.category.index', compact('listCategories'));
    }
    # return add category view
    public function create()
    {
        return view('admin_page.category.add');
    }
    # store record to db
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $status = Category::create($input);

        if($status){

            return redirect()->route('categories.index')->with('messageSuccess', trans('messages.category.add.success'));
        } else {

            return redirect()->route('categories.index')->with('messageFail', trans('messages.category.add.fail'));
        }
    }
    # return edit category view
    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin_page.category.edit', compact('category'));
    }

    public function edit($id)
    {
        //
    }
    //update record
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->all();
        $status = Category::where('id', $id)->update(['name_category' => $input['name_category'], 'url_cate' => $input['url_cate'], 'is_active' => $input['is_active']]);

        if($status){

            return redirect()->route('categories.index')->with('messageSuccess', trans('messages.category.edit.success'));
        } else {

            return redirect()->route('categories.index')->with('messageFail', trans('messages.category.edit.fail'));
        }
    }
    # del record
    public function destroy($id)
    {
        $status = Category::where('id', $id)->delete();
        if($status){

            return redirect()->route('categories.index')->with('messageSuccess', trans('messages.category.del.success'));
        } else {

            return redirect()->route('categories.index')->with('messageFail', trans('messages.category.del.fail'));
        }
    }
    # live search by ajax . return result of search by the cate name
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $listCategories = Category::where('name_category', 'LIKE', "%{$text}%")->paginate(config('setting.paginate'));

            return view('ajax.admin.category.search', compact('listCategories'));
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //trả về view index
    public function index()
    {
        $listCategories = Category::all();

        return view('admin_page.category.index', compact('listCategories'));
    }
    //trả về view add
    public function create()
    {
        return view('admin_page.category.add');
    }
    // lưu bản ghi vào db
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $status = Category::create($input);

        if($status){

            return redirect()->route('category.index')->with('messageSuccess', trans('messages.category.add.success'));
        } else {

            return redirect()->route('category.index')->with('messageFail', trans('messages.category.add.fail'));
        }
    }
    //trả về view edit
    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin_page.category.edit', compact('category'));
    }

    public function edit($id)
    {
        //
    }
    //cập nhật bản ghi
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->all();
        $status = Category::where('id', $id)->update(['name_category' => $input['name_category'], 'url_cate' => $input['url_cate'], 'is_active' => $input['is_active']]);

        if($status){

            return redirect()->route('category.index')->with('messageSuccess', trans('messages.category.edit.success'));
        } else {

            return redirect()->route('category.index')->with('messageFail', trans('messages.category.edit.fail'));
        }
    }
    //xóa bản ghi
    public function destroy($id)
    {
        $status = Category::where('id', $id)->delete();
        if($status){

            return redirect()->route('category.index')->with('messageSuccess', trans('messages.category.del.success'));
        } else {

            return redirect()->route('category.index')->with('messageFail', trans('messages.category.del.fail'));
        }
    }
    //live search bằng ajax . return kết quả search theo tên cate
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $listCategories = Category::where('name_category', 'LIKE', "%{$text}%")->get();

            return view('ajax.admin.category.search', compact('listCategories'));
        }
    }
}

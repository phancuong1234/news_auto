<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Config_RSS_Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfigLinkRSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listConfig = Config_RSS_Link::paginate(config('setting.paginate'));

        return view('admin_page.config_link_rss.index', compact('listConfig'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configRss = Config_RSS_Link::where('parent_id', 0)->get();
        $idCateParent = [];
        array_push($idCateParent, trans('messages.category.no_parent_cate'));
        foreach ($configRss as $key => $value){
            $idCateParent[$value->id] = $value->name_cate;
        }

        return view('admin_page.config_link_rss.add', compact('idCateParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['link'] = str_replace(str_split('\\*?"<>|()'), '', $input['link']);
        $status = Config_RSS_Link::create($input);
        if($status){

            return redirect()->route('config.index')->with('messageSuccess', trans('messages.config.add.success'));
        } else {

            return redirect()->route('config.index')->with('messageFail', trans('messages.config.add.fail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configRss = Config_RSS_Link::where('parent_id',0)->where('id','!=', $id)->get();
        $idCateParent = [];
        array_push($idCateParent, trans('messages.category.no_parent_cate'));
        foreach ($configRss as $key => $value){
            $idCateParent[$value->id] = $value->name_cate;
        }
        $config = Config_RSS_Link::where('id', $id)->first();
        if (!isset($config)){
            return redirect()->route('404');
        }

        return view('admin_page.config_link_rss.edit', compact('idCateParent', 'config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_method'], $input['_token']);
        $input['link'] = str_replace(str_split('\\*?"<>|()'), '', $input['link']);
        $status = Config_RSS_Link::where('id', $id)->update($input);
        if($status){

            return redirect()->route('config.index')->with('messageSuccess', trans('messages.config.edit.success'));
        } else {

            return redirect()->route('config.index')->with('messageFail', trans('messages.config.edit.fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Config_RSS_Link::find($id)->delete();

            return redirect()->route('config.index')->with('messageSuccess', trans('messages.config.del.success'));
        }
        catch (Exception $exception)
        {
            return redirect()->route('config.index')->with('messageFail', trans('messages.config.del.fail'));
        }
    }
}

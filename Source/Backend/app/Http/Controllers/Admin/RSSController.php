<?php

namespace App\Http\Controllers\Admin;

use App\Models\RSS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;

class RSSController extends Controller
{
    public function index(){
        $listRSS = RSS::paginate(config('setting.paginate'));

        return view('admin_page.rss_news.index', compact('listRSS'));
    }

    public function show($id){
        try{
            $detailRSS = RSS::find($id);
            $detailRSS['date_start'] = date("d-m-Y", strtotime($detailRSS['date_start']));
            $detailRSS['date_end'] = date("d-m-Y", strtotime($detailRSS['date_end']));

            return view('admin_page.rss_news.edit', compact('detailRSS'));
        }
        catch (Exception $exception){
            return redirect()->route('rss.index')->with('messageFail', 'Truy cập thất bại');
        }
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $input['date_start'] = date("Y-m-d", strtotime($input['date_start']));
        $input['date_end'] = date("Y-m-d", strtotime($input['date_end']));
        unset($input['_method'], $input['_token']);

        $status = RSS::where('id', $id)->update($input);
        if ($status){
            return redirect()->route('rss.index')->with('messageSuccess', 'Cập nhật RSS thành công');
        }
        else {
            return redirect()->route('rss.index')->with('messageFail', 'Cập nhật RSS thất bại');
        }
    }

    public function destroy($id){
        try{
            RSS::find($id)->delete();

            return redirect()->route('rss.index')->with('messageSuccess', 'Xóa RSS thành công');
        }
        catch (Exception $exception){
            return redirect()->route('rss.index')->with('messageFail', 'Xóa RSS thất bại');
        }
    }
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $listRSS = RSS::where('name_page', 'LIKE', "%{$text}%")
                ->orWhere('title', 'LIKE', "%{$text}%")
                ->orWhere('category', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.rss.search', compact('listRSS'));
        }
    }
}

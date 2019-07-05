<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_comments = Comment::select('comments.*', 'users.username', 'news.title as title_news')
            ->join('users', 'users.id', '=', 'comments.id_user')
            ->join('news', 'news.id', 'comments.id_news')
            ->paginate(config('setting.paginate'));
        foreach ($list_comments as $key => $value){
            $listCate = Comment::join('news', 'news.id', 'comments.id_news')->first()->list_id_category;
            $nameCate = Category::whereIn('id', json_decode($listCate))->first()->name_category;
            $nameCateFormat = str_replace(' ', '-', $this->stripunicode($nameCate));
            $titleNewsFormat = str_replace(' ', '-', $this->stripunicode($value->title_news));
            $value['link']= $nameCateFormat.'/'.$titleNewsFormat;
        }

        return view('admin_page.comment.index', compact('list_comments'));
    }
    //strip unicode
    public function stripunicode($str){
        if(!$str) return false;
        $unicode = array('a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ','D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ','Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ');
        foreach($unicode as $khongdau => $codau) {
            $arr=explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    public function destroy($id)
    {
        try {
            Comment::find($id)->delete();

            return redirect()->route('comments.index')->with('messageFail', trans('messages.comment.del.success'));
        }
        catch (Exception $exception)
        {
            return redirect()->route('comments.index')->with('messageFail', trans('messages.comment.del.fail'));
        }
    }
    #ajax update status
    public function update($id)
    {
            $status = Comment::where('id', $id)->first()->is_active;
            if($status == config('setting.is_active.active')){
                $status = config('setting.is_active.lock');
            }
            else {
                $status = config('setting.is_active.active');
            }
            Comment::find($id)->update(['is_active' => $status]);
    }
    # live search by ajax . return result of search by the title or id or id_user
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $list_comments = Comment::select('comments.*', 'users.username')
                ->join('users', 'users.id', '=', 'comments.id_user')
                ->where('users.username', 'LIKE', "%{$text}%")
                ->orWhere('comments.id', 'LIKE', "%{$text}%")
                ->orWhere('comments.content', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.comment.search', compact('list_comments'));
        }
    }
}

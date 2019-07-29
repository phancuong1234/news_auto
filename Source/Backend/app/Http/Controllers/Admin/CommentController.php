<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
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
            $listCate = Comment::join('news', 'news.id', 'comments.id_news')->where('comments.id_news', $value->id_news)->first()->id_category;
            $nameCate = Category::where('id', $listCate)->first()->slug;
            $linkNews = News::where('id', $value->id_news)->first()->slug;
            $value['link']= 'danh-muc/'.$nameCate.'/'.$linkNews;
        }

        return view('admin_page.comment.index', compact('list_comments'));
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
            $list_comments = Comment::select('comments.*', 'users.username', 'news.title as title_news')
                ->join('users', 'users.id', '=', 'comments.id_user')
                ->join('news', 'news.id', 'comments.id_news')
                ->where('users.username', 'LIKE', "%{$text}%")
                ->orWhere('comments.id', 'LIKE', "%{$text}%")
                ->orWhere('comments.content', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            foreach ($list_comments as $key => $value){
                $listCate = Comment::select('news.id_category')
                    ->join('news', 'news.id', 'comments.id_news')
                    ->where('comments.id_news', $value->id_news)
                    ->first()
                    ->id_category;
                $nameCate = Category::select('slug')->where('id', $listCate)->first()->slug;
                $linkNews = News::select('slug')->where('id', $value->id_news)->first()->slug;
                $value['link']= 'danh-muc/'.$nameCate.'/'.$linkNews;
            }

            return view('ajax.admin.comment.search', compact('list_comments'));
        }
    }
}

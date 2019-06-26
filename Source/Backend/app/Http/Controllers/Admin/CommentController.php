<?php

namespace App\Http\Controllers\Admin;

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
        $list_comments = Comment::select('comments.*', 'users.username')
            ->join('users', 'users.id', '=', 'comments.id_user')
            ->paginate(config('setting.paginate'));

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

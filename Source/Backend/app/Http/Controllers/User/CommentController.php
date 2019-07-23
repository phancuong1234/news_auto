<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $input['id_user'] = Auth::user()->id;
        $create = Comment::create($input);
        $listCmt = Comment::join('users', 'users.id', '=', 'comments.id_user')
                ->select('users.username','users.image','comments.*')
                ->where('id_news', $input['id_news'])
                ->orderBy('id','DESC')
                ->limit(config('setting.viewUser.limit-show-cmt'))
                ->get();
        return view('ajax.user.comment.index', compact('listCmt'));
    }

    public function getMore($position, $id){
        $listCmt = Comment::join('users', 'users.id', '=', 'comments.id_user')
            ->select('users.username','users.image','comments.*')
            ->where('comments.id_news', $id)
            ->whereBetween('comments.id', [$position-5, $position-1])
            ->orderBy('comments.id','DESC')
            ->get();
        
        if($listCmt->count() > 0){
            return view('ajax.user.comment.index', compact('listCmt'));
        }
        else {
            return null;
        }
        
    }
}

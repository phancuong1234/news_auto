<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller
{
    public function home(){
        $list_news = News::where('is_active',config('setting.is_active.active'))
                            ->orderBy('id','DESC')
                            ->paginate(config('setting.viewUser.paginate-new'));
        $main_new = News::orderBy('number_view','DESC')
                        ->whereDay('created_at',date('d'))
                        ->where('is_active',config('setting.is_active.active'))
                        ->limit(config('setting.viewUser.limit'))
                        ->get();
        // dd($news_rule);
        $listCate = Category::all();
        $arrNews = [];
        foreach($listCate as $key => $value){
            $listIdNews = News::select('categories.name_category','categories.id', 'news.*')
                                ->join('categories','news.id_category','=','categories.id')
                                ->where('id_category', $value->id)
                                ->where('news.is_active',config('setting.is_active.active'))
                                ->limit(config('setting.viewUser.limit-list-id-new'))
                                ->get();
            foreach($listIdNews as $news => $valueNews){
                $arrNews[$key]['name_category'] = $value->name_category;
                $arrNews[$key]['id_cate'] = $value->id;
                $arrNews[$key][$news]['id'] = $valueNews->id;
                $arrNews[$key][$news]['title'] = $valueNews->title;
                $arrNews[$key][$news]['short_description'] = $valueNews->short_description;
                $arrNews[$key][$news]['image'] = $valueNews->image;
            }
        }
        return view('user_page.home',compact('list_news','main_new','arrNews'));
    }
    public function detail($id)
    {
        $detail = News::where('news.id',$id)
                        ->join('users','news.id_user','=','users.id')
                        ->select('users.username','news.*')
                        ->first();
        
        $news_same_cate = News::where('id_category',$detail->id_category)->inRandomOrder()->paginate(3);
        $listCmt = Comment::join('users', 'users.id', '=', 'comments.id_user')
                    ->select('users.username','users.image','comments.*')
                    ->where('id_news', $id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();

        return view('user_page.detail',compact('detail','news_same_cate', 'listCmt'));
    }

    public function category($id)
    {
        $main_news_cate = News::where('id_category',$id)->inRandomOrder()->first();
        $news_cate = News::where('id_category',$id)
                            ->where('is_active',config('setting.is_active.active'))
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();
        $all_news_cate = News::where('id_category',$id)
                            ->where('is_active',config('setting.is_active.active'))
                            ->inRandomOrder()
                            ->paginate(6);
        return view('user_page.category',compact('main_news_cate','news_cate','all_news_cate'));
    }

    public function search(Request $request)
    {
        $keyword = $request->key;
        $NewSearch = News::where('title','like','%'.$keyword.'%')
                            ->orwhere('short_description','like','%'.$keyword.'%')
                            ->paginate(8);
        return view('user_page.search',compact('NewSearch','keyword'));
    }

}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Cookie;

class NewsController extends Controller
{
    public function home(){
        $main_new = News::join('categories', 'categories.id', '=', 'news.id_category')
            ->select('news.*', 'categories.slug as slug_cate')
            ->orderBy('news.id','DESC')
            ->where('news.is_active',config('setting.is_active.active'))
            ->first();
        $list_news = News::join('categories', 'categories.id', '=', 'news.id_category')
                            ->select('news.*', 'categories.slug as slug_cate')
                            ->where('news.is_active',config('setting.is_active.active'))
                            ->where('news.id', '!=', $main_new->id)
                            ->orderBy('news.id','DESC')
                            ->paginate(config('setting.viewUser.paginate-new'));
        $listCate = Category::all();
        $arrNews = [];
        foreach($listCate as $key => $value){
            $listIdNews = News::select('categories.name_category', 'categories.id', 'categories.slug as slug_cate', 'news.*')
                                ->join('categories','news.id_category','=','categories.id')
                                ->where('id_category', $value->id)
                                ->where('news.is_active',config('setting.is_active.active'))
                                ->limit(config('setting.viewUser.limit-list-id-new'))
                                ->get();

            foreach($listIdNews as $news => $valueNews){
                $arrNews[$key]['name_category'] = $value->name_category;
                $arrNews[$key]['id_cate'] = $value->id;
                $arrNews[$key]['slug'] = $value->slug;
                $arrNews[$key][$news]['id'] = $valueNews->id;
                $arrNews[$key][$news]['title'] = $valueNews->title;
                $arrNews[$key][$news]['short_description'] = $valueNews->short_description;
                $arrNews[$key][$news]['image'] = $valueNews->image;
                $arrNews[$key][$news]['slug'] = $valueNews->slug;
                $arrNews[$key][$news]['slug_cate'] = $valueNews->slug_cate;
            }
        }

        return view('user_page.home',compact('list_news','main_new','arrNews'));
    }
    public function detail($category, $news)
    {
        $getIdNews = News::where('slug', $news)->first();
        if (!isset($getIdNews)){
            return redirect()->route('404');
        }
        $category = Category::where('id', $getIdNews->id_category)->first();
        $detail = News::where('news.id', $getIdNews->id)
                        ->join('users','news.id_user','=','users.id')
                        ->select('users.username','news.*')
                        ->first();
        $listNewsByCate = News::join('categories', 'categories.id', '=', 'news.id_category')
                        ->select('news.*', 'categories.slug as slug_cate')
                        ->where('news.id_category',$detail->id_category)
                        ->inRandomOrder()->get()->take(config('setting.viewUser.limit_same_cate'));
        $arrNewsSameCate = [];
        $j = 0;
        for ($i = 0;$i < config('setting.viewUser.show_news_same_cate');$i++){
            $dem = 0;
            for ($j;$dem < config('setting.viewUser.show_news_same_cate');$j++){
                $arrNewsSameCate[$i][$j] = $listNewsByCate[$j];
                $dem ++ ;
            }
        }
        $listCmt = Comment::join('users', 'users.id', '=', 'comments.id_user')
                    ->select('users.username','users.image','comments.*')
                    ->where('id_news', $getIdNews->id)
                    ->orderBy('id','DESC')
                    ->limit(config('setting.viewUser.limit-show-cmt'))
                    ->get();
        if ((int)Cookie::get('view_'.$getIdNews->id) == $getIdNews->id){
            return view('user_page.detail',compact('detail','arrNewsSameCate', 'listCmt', 'category'));
        } else {
            $count = News::where('id', $getIdNews->id)->first()->number_view + 1;
            News::find($getIdNews->id)->update(['number_view' => (int)$count]);
            $detail = News::where('news.id', $getIdNews->id)
                ->join('users','news.id_user','=','users.id')
                ->select('users.username','news.*')
                ->first();

            return response()->view('user_page.detail', compact('detail','arrNewsSameCate', 'listCmt', 'category'))
                ->withCookie('view_'.$getIdNews->id, $getIdNews->id, time()+3600);
        }
    }

    public function category($category)
    {
        $idCate = Category::where('slug', $category)->first();
        if (!isset($idCate)){
            return redirect()->route('404');
        }
        $main_news_cate = News::join('categories', 'categories.id', '=', 'news.id_category')
                            ->select('news.*', 'categories.slug as slug_cate')
                            ->where('news.id_category', $idCate->id)
                            ->inRandomOrder()
                            ->first();
        $news_cate = News::join('categories', 'categories.id', '=', 'news.id_category')
                            ->select('news.*', 'categories.slug as slug_cate')
                            ->where('news.id_category', $idCate->id)
                            ->where('news.is_active',config('setting.is_active.active'))
                            ->inRandomOrder()
                            ->limit(config('setting.viewUser.paginate-new-cate'))
                            ->get();
        $all_news_cate = News::join('categories', 'categories.id', '=', 'news.id_category')
                            ->select('news.*', 'categories.slug as slug_cate')
                            ->where('news.id_category', $idCate->id)
                            ->where('news.is_active',config('setting.is_active.active'))
                            ->inRandomOrder()
                            ->paginate(config('setting.viewUser.paginate-all-new-cate'));

        return view('user_page.category',compact('main_news_cate','news_cate','all_news_cate', 'idCate'));
    }

    public function search(Request $request)
    {
        $keyword = $request->key;
        $NewSearch = News::join('categories', 'categories.id', '=', 'news.id_category')
                            ->select('news.*', 'categories.slug as slug_cate')
                            ->where([['title','like','%'.$keyword.'%'],['news.is_active', '=', config('setting.is_active.active')]])
                            ->orwhere('news.short_description','like','%'.$keyword.'%')
                            ->paginate(config('setting.viewUser.paginate-search'));

        return view('user_page.search',compact('NewSearch','keyword'));
    }

    public function searchTypeHead(Request $request)
    {
        $keyword = $request->value;
        $NewSearch = News::join('categories', 'categories.id', '=', 'news.id_category')
            ->select('news.slug', 'news.image', 'news.title', 'categories.slug as slug_cate')
            ->where([['title','like','%'.$keyword.'%'],['news.is_active', '=', config('setting.is_active.active')]])
            ->inRandomOrder()
            ->get();

        return response()->json($NewSearch);
    }
}

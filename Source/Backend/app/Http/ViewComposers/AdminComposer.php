<?php


namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\News;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AdminComposer {


    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()){
            $name_role = Role::find(Auth::user())->first()->name_role;
            $view->with('name_role', $name_role);
        }
        $list_category = Category::where('id','!=',config('setting.viewUser.id-video'))
            ->where('is_active',config('setting.is_active.active'))
            ->paginate(config('setting.viewUser.paginate-cate'));
        $top_view = News::join('categories', 'categories.id', '=', 'news.id_category')
            ->select('news.*', 'categories.slug as slug_cate')
            ->orderBy('news.number_view','DESC')
            ->where('news.is_active',config('setting.is_active.active'))
            ->limit(config('setting.viewUser.limit-top-view'))
            ->get();
        $title_news = News::join('categories', 'categories.id', '=', 'news.id_category')
            ->select('news.*', 'categories.slug as slug_cate')
            ->orderBy('news.number_view','DESC')
            ->limit(config('setting.viewUser.limit-title'))
            ->get();
        $view->with('list_category', $list_category);
        $view->with('top_view', $top_view);
        $view->with('title_news', $title_news);
    }


}

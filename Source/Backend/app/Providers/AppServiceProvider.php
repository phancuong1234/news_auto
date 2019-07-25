<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
            View::share('list_category', $list_category);
            View::share('top_view', $top_view);
            View::share('title_news', $title_news);
    }

}

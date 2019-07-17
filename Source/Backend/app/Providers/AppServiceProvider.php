<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\View;

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
            $list_category = Category::paginate(config('setting.viewUser.paginate-cate'));
            $top_view = News::orderBy('number_view','DESC')
                            ->limit(config('setting.viewUser.limit-top-view'))
                            ->get();
            $title_news = News::orderBy('number_view','DESC')
                            ->limit(config('setting.viewUser.limit-title'))
                            ->get(); 
            View::share('list_category', $list_category);
            View::share('top_view', $top_view);
            View::share('title_news', $title_news);
    }
}

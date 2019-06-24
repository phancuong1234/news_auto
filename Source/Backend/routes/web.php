<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('index');
    });
    Route::namespace('Admin')->group(function () {
        #category
        Route::resource('categories','CategoryController');
        #users
        Route::resource('users','UserController');
        #news
        Route::resource('news','NewsController');
        #crawler
        Route::resource('crawler','CrawlController');
        # commment
        Route::resource('comments', 'CommentController');
        #livesearch
        Route::get('/categories/search/{text}',[
        Route::get('ChartUser',[
            'as'=>'ChartUser',
            'uses'=>'ChartController@index',
        ]);
        Route::get('ChartView',[
            'as'=>'ChartView',
            'uses'=>'ChartController@indexView',
        ]);

        Route::get('ChartComment',[
            'as'=>'ChartComment',
            'uses'=>'ChartController@indexComment',
        ]);

        Route::get('ChartArticle',[
            'as'=>'ChartArticle',
            'uses'=>'ChartController@indexArticle',
        ]);
        Route::get('ChartArticleRate',[
            'as'=>'ChartArticleRate',
            'uses'=>'ChartController@indexArticleRate',
        ]);

        //ajax
        Route::get('/ajax/chart/get-number-Comment-every-month',[
            'uses' => 'ChartController@countComment',
        ]);

        Route::get('/ajax/chart/get-count-article-every-month',[
            'uses' => 'ChartController@countArticle',
        ]);

        Route::get('/ajax/chart/get-number-user-every-month',[
            'uses' => 'ChartController@countUser',
        ]);

        Route::get('/ajax/chart/get-number-view-every-month',[
            'uses' => 'ChartController@countView',
        ]);

        Route::get('/ajax/chart/get-number-comment-by-month/{month}',[
            'uses'=>'ChartController@commentChartByMonth',
        ]);
        Route::get('/ajax/chart/get-count-article-every-month/{id}',[
            'uses'=>'ChartController@ChartArticleByCategory',
        ]);
        Route::get('/ajax/chart/get-article-rate',[
            'uses' => 'ChartController@countArticleRate',
        ]);
        //live search
        Route::get('/category/search/{text}',[
            'as' => 'search.category',
            'uses' => 'CategoryController@getSearchAjax',
        ]);
        Route::get('/news/search/{text}',[
            'as' => 'search.news',
            'uses' => 'NewsController@getSearchAjax',
        ]);
        Route::get('/comments/search/{text}',[
            'as' => 'search.comments',
            'uses' => 'CommentController@getSearchAjax',
        ]);
        # crawl auto
        Route::get('/crawl-auto',[
            'as' => 'crawl.auto',
            'uses' => 'CrawlController@crawl',
        ]);
    });
});

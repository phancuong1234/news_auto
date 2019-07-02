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
        #index pending news
        Route::get('/pending/news',[
            'as' => 'pending.news',
            'uses' => 'NewsController@pendingIndex',
        ]);
        #pending preview
        Route::get('/pending/news/preview/{id}',[
            'as' => 'pending.news.preview',
            'uses' => 'NewsController@pendingPreview',
        ]);
        #accept news
        Route::patch('/pending/news/{id}',[
            'as' => 'pending.accept.news',
            'uses' => 'NewsController@approve',
        ]);
        #crawler
        Route::resource('crawler','CrawlController');
        # commment
        Route::resource('comments', 'CommentController');
        #livesearch
        Route::get('/categories/search/{text}',[
            'as' => 'search.category',
            'uses' => 'CategoryController@getSearchAjax',
        ]);
        Route::get('/news/search/keyword={text}/type={typeRQ}',[
            'as' => 'search.news',
            'uses' => 'NewsController@getSearchAjax',
        ]);
        Route::get('/comments/search/{text}',[
            'as' => 'search.comments',
            'uses' => 'CommentController@getSearchAjax',
        ]);
        # chart
        Route::get('ChartUser', [
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
        Route::get('ChartArticleTopView',[
            'as'=>'ChartArticleTopView',
            'uses'=>'ChartController@indexArticleTopView',
        ]);
        //ajax chart
        Route::get('/ajax/chart/get-number-user-every-month',[
            'uses' => 'ChartController@countUser',
        ]);

        Route::get('/ajax/chart/get-number-user-by-year/{year}',[
            'uses' => 'ChartController@countUserByYear',
        ]);

        Route::get('/ajax/chart/get-number-Comment-every-month',[
            'uses' => 'ChartController@countComment',
        ]);

        Route::get('/ajax/chart/get-number-comment-by-month/{month}',[
            'uses'=>'ChartController@commentChartByMonth',
        ]);

        Route::get('/ajax/chart/get-number-view-every-month',[
            'uses' => 'ChartController@countView',
        ]);

        Route::get('/ajax/chart/get-number-view-by-year/{year}',[
            'uses' => 'ChartController@countViewByYear',
        ]);

        Route::get('/ajax/chart/get-top-view-in-year',[
            'uses' => 'ChartController@topViewArt',
        ]);

        Route::get('/ajax/chart/get-top-view-in-choose-time/{year}-{month}',[
            'uses' => 'ChartController@topViewArtChooseTime',
        ]);

        Route::get('/ajax/chart/get-count-article-every-month',[
            'uses' => 'ChartController@countArticle',
        ]);

        Route::get('/ajax/chart/get-count-article-by-category/{id}',[
            'uses'=>'ChartController@ChartArticleByCategory',
        ]);

        Route::get('/ajax/chart/get-count-article-by-year/{year}',[
            'uses'=>'ChartController@ChartArticleByYear',
        ]);

        Route::get('/ajax/chart/get-article-rate',[
            'uses' => 'ChartController@countArticleRate',
        ]);
        # crawl auto
        Route::get('/crawl-auto',[
            'as' => 'crawl.auto',
            'uses' => 'CrawlController@crawl',
        ]);
    });
});

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
#profile
Route::resource('profile','MyProfileController');
#ajax load form
Route::get('/ajax/profile',[
    'uses' => 'MyProfileController@ajaxLoad',
]);
Route::prefix('user')->group(function () {
    Route::namespace('User')->group(function () {
        Route::get('home-page',[
            'as'=>'home-page',
            'uses'=>'UserController@home',
        ]);
        Route::get('detail/{id}',[
            'as'=>'detail',
            'uses'=>'UserController@detail',
        ]);
        Route::get('category/{id}',[
            'as'=>'category',
            'uses'=>'UserController@category',
        ]);
    });
});
Route::namespace('Authentication')->group(function () {
    #login
    Route::resource('login', 'LoginController');
    #register
    Route::resource('register', 'RegisterController');
});
Route::prefix('admin')->middleware(['can:login-admin'])->group(function () {
    Route::namespace('Admin')->group(function () {
        #admin-dashboard
        Route::resource('dashboard','DashBoardController');
        #category
        Route::resource('categories','CategoryController')->middleware(['can:editor']);
        #users
        Route::resource('users','UserController')->middleware(['can:editor']);
                
        Route::get('AdminManager', [
            'as'=>'AdminManager',
            'uses'=>'UserManagerController@AdminManager',
        ])->middleware(['can:editor']);
        Route::get('ModManager', [
            'as'=>'ModManager',
            'uses'=>'UserManagerController@ModManager',
        ])->middleware(['can:editor']);
        Route::get('ViewerManager', [
            'as'=>'ViewerManager',
            'uses'=>'UserManagerController@ViewerManager',
        ])->middleware(['can:editor']);
        #news
        Route::resource('news','NewsController');
        #crawler
        Route::resource('crawler','CrawlController');
        #news_rss
        Route::resource('rss','RSSController');
        # commment
        Route::resource('comments', 'CommentController')->middleware(['can:editor']);
        #index pending news
        Route::get('/pending/news',[
            'as' => 'pending.news',
            'uses' => 'NewsController@pendingIndex',
        ]);
        #pending preview
        Route::get('/pending/news/preview/{id}/type={type}',[
            'as' => 'pending.news.preview',
            'uses' => 'NewsController@pendingPreview',
        ]);
        #accept news
        Route::patch('/pending/news/{id}',[
            'as' => 'pending.accept.news',
            'uses' => 'NewsController@approve',
        ]);
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
        Route::get('/users/search/{text}',[
            'as' => 'search.users',
            'uses' => 'UserManagerController@getSearchAjax',
        ]);
        Route::get('/viewer/search/{text}',[
            'as' => 'search.viewer',
            'uses' => 'UserManagerController@getSearchViewerAjax',
        ]);
        Route::get('/rss/search/{text}',[
            'as' => 'search.rss',
            'uses' => 'RSSController@getSearchAjax',
        ]);
        # crawl auto
        Route::resource('crawler','CrawlController')->middleware(['can:admin']);
        
        Route::get('/crawl-auto',[
            'as' => 'crawl.auto',
            'uses' => 'CrawlController@crawl',
        ]);

        Route::get('/index-crawl-by-xml',[
            'as' => 'index.crawl.xml',
            'uses' => 'CrawlController@indexPageCrawlByRSS',
        ])->middleware(['can:admin']);

        Route::post('/crawl-by-xml',[
            'as' => 'crawl.xml',
            'uses' => 'CrawlController@CrawlByRSS',
        ]);
        # chart
        Route::get('ChartUser', [
            'as'=>'ChartUser',
            'uses'=>'ChartController@index',
        ])->middleware(['can:editor']);

        Route::get('ChartView',[
            'as'=>'ChartView',
            'uses'=>'ChartController@indexView',
        ])->middleware(['can:editor']);

        Route::get('ChartComment',[
            'as'=>'ChartComment',
            'uses'=>'ChartController@indexComment',
        ])->middleware(['can:editor']);

        Route::get('ChartArticle',[
            'as'=>'ChartArticle',
            'uses'=>'ChartController@indexArticle',
        ])->middleware(['can:editor']);
        Route::get('ChartArticleRate',[
            'as'=>'ChartArticleRate',
            'uses'=>'ChartController@indexArticleRate',
        ])->middleware(['can:editor']);
        Route::get('ChartArticleTopView',[
            'as'=>'ChartArticleTopView',
            'uses'=>'ChartController@indexArticleTopView',
        ])->middleware(['can:editor']);

        Route::get('ChartTopMod',[
            'as'=>'ChartTopMod',
            'uses'=>'ChartController@indexChartTopMod',
        ])->middleware(['can:editor']);
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

        Route::get('/ajax/chart/get-count-view-by-category',[
            'uses'=>'ChartController@ChartViewByCategory',
        ]);

        Route::get('/ajax/chart/get-top-view-in-year',[
            'uses' => 'ChartController@topViewArt',
        ]);

        Route::get('/ajax/chart/get-top-view-in-choose-time/{year}-{month}/{amount}',[
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

        Route::get('/ajax/chart/get-top-btv-in-this-year',[
            'uses' => 'ChartController@topBTV',
        ]);

        Route::get('/ajax/chart/get-top-mod-in-choose-time/{year}-{month}/{amount}',[
            'uses' => 'ChartController@topModChooseTime',
        ]);
    });
});

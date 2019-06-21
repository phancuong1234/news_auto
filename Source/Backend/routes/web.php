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

        Route::resource('category','CategoryController');

        Route::resource('users','UserController');

        Route::resource('news','NewsController');

        Route::get('/category/search/{text}',[
            'as' => 'search.category',
            'uses' => 'CategoryController@getSearchAjax',
        ]);

        Route::get('/news/search/{text}',[
            'as' => 'search.news',
            'uses' => 'NewsController@getSearchAjax',
        ]);

    });
});


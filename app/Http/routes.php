<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Route::group(['prefix'=>'backend', 'middleware' => ['web']], function(){

    Route::get('/login', 'Backend\AuthController@showLoginForm');
    Route::post('/login', 'Backend\AuthController@login');
    Route::get('/loginout', 'Backend\AuthController@logout');
    /*Route::get('/register', 'Backend\AuthController@getRegister');
    Route::post('/register', 'Backend\AuthController@postRegister');*/

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/', 'Backend\HomeController@index');
        Route::resource('article', 'Backend\ArticleController');
        Route::resource('category', 'Backend\CategoryController');
    });
});

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/test', function () {
//    return view('test');
//});
#Group routs for users part
Route::group(['middleware'=>'web'], function (){

    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    Route::auth();

});

#Group routs for admin

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    #admin
    Route::get('/', function (){

    });
    #admin/pages
    Route::group(['prefix'=>'pages'], function (){

        Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);

        #admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses'=>'PagesController@add', 'as'=>'pagesAdd']);

        #admin/edit/1
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'PagesController@edit', 'as'=>'pagesEdit']);

    });

    Route::group(['prefix'=>'portfolio'], function (){

        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);

        Route::match(['get', 'post'], '/add', ['uses'=>'PortfolioController@add', 'as'=>'portfolioAdd']);

        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'PortfolioController@edit', 'as'=>'portfolioEdit']);

    });

        Route::group(['prefix'=>'services'], function (){

        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);

        Route::match(['get', 'post'], '/add', ['uses'=>'ServiceController@add', 'as'=>'serviceAdd']);

        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'ServiceController@edit', 'as'=>'serviceEdit']);

    });


});



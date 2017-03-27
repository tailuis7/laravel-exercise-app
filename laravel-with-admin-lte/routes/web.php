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

Route::get('/', 'HomeController@index');

// Route::get('/home', function () {
//     echo "sadas";
// });

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	
    Route::get('/blog_detail', 'HomeController@showBlogDetail');

    Route::get('/create', 'HomeController@create');

    Route::post('/store', 'HomeController@store');


    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin', 'AdminController@admin');

    });
    
});

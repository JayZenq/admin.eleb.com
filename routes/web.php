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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/shop_categories','Shop_categoriesController');
Route::resource('/shops','ShopsController');

//Route::get('/user/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
//Route::get('/users/status','UsersController@status')->name('users.status');
Route::get('/users_status/{user}', 'UsersController@status')->name('users.status');
Route::get('/shops_status/{shop}', 'ShopsController@status')->name('shops.status');
Route::resource('/users','UsersController');
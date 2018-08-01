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
    return redirect('admins');
});

Route::resource('/shop_categories','Shop_categoriesController');
Route::resource('/shops','ShopsController');

//Route::get('/user/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
//Route::get('/users/status','UsersController@status')->name('users.status');
Route::get('/users_status/{user}', 'UsersController@status')->name('users.status');
Route::get('/shops_status/{shop}', 'ShopsController@status')->name('shops.status');
Route::resource('/users','UsersController');
Route::resource('/admins','AdminsController');

//会话管理
Route::get('login', 'SessionController@login')->name('login');
Route::get('change/{admin}', 'SessionController@change')->name('change');

Route::post('login', 'SessionController@store')->name('login');
Route::delete('logout', 'SessionController@destroy')->name('logout');
Route::patch('update/{admin}', 'SessionController@update')->name('update');

Route::get('users/change/{user}', 'UsersController@change')->name('users.change');
Route::patch('users/update/{user}', 'UsersController@updates')->name('users.updates');

//文件上传的路由
Route::post('upload',function (){
    $storage =  \Illuminate\Support\Facades\Storage::disk('oss');
    $fileName= $storage->putFile('upload',request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName),
    ];
})->name('upload');

Route::resource('/activities','ActivitiesController');
Route::resource('/member','MembersController');

Route::get('/member_status/{member}', 'MembersController@status')->name('member.status');
//统计
Route::get('/order_count', 'OrdersController@count')->name('order.count');
Route::get('/order_month', 'OrdersController@month')->name('order.month');
Route::get('/order_day', 'OrdersController@day')->name('order.day');
Route::get('/order_menu', 'OrdersController@menu')->name('order.menu');
Route::get('/order_menum', 'OrdersController@menu_month')->name('order.menu_month');
Route::get('/order_mday', 'OrdersController@mday')->name('order.mday');
//权限的资源路由
Route::resource('/permission','PermissionsController');
//角色的资源路由
Route::resource('/role','RoleController');
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
    return redirect('order_count');
});

Route::resource('/shop_categories','Shop_categoriesController')->middleware(['role:商家管理员|大老板(为所欲为)']);
Route::resource('/shops','ShopsController')->middleware(['role:商家管理员|大老板(为所欲为)']);

//Route::get('/user/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
//Route::get('/users/status','UsersController@status')->name('users.status');
Route::get('/users_status/{user}', 'UsersController@status')->name('users.status')->middleware(['role:商家管理员|大老板(为所欲为)']);
Route::get('/shops_status/{shop}', 'ShopsController@status')->name('shops.status')->middleware(['role:商家管理员|大老板(为所欲为)']);
Route::resource('/users','UsersController')->middleware(['role:商家管理员|大老板(为所欲为)']);
Route::resource('/admins','AdminsController')->middleware(['role:商家管理员|大老板(为所欲为)']);

//会话管理
Route::get('login', 'SessionController@login')->name('login');
Route::get('change/{admin}', 'SessionController@change')->name('change');

Route::post('login', 'SessionController@store')->name('login');
Route::delete('logout', 'SessionController@destroy')->name('logout');
Route::patch('update/{admin}', 'SessionController@update')->name('update');

Route::get('users/change/{user}', 'UsersController@change')->name('users.change')->middleware(['role:商家管理员|大老板(为所欲为)']);
Route::patch('users/update/{user}', 'UsersController@updates')->name('users.updates')->middleware(['role:商家管理员|大老板(为所欲为)']);

//文件上传的路由
Route::post('upload',function (){
    $storage =  \Illuminate\Support\Facades\Storage::disk('oss');
    $fileName= $storage->putFile('upload',request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName),
    ];
})->name('upload');

Route::resource('/activities','ActivitiesController')->middleware(['role:活动管理员|大老板(为所欲为)']);
Route::resource('/member','MembersController')->middleware(['role:用户管理员|大老板(为所欲为)']);

Route::get('/member_status/{member}', 'MembersController@status')->name('member.status');
//统计
Route::get('/order_count', 'OrdersController@count')->name('order.count');
Route::get('/order_month', 'OrdersController@month')->name('order.month')->middleware(['permission:orders']);
Route::get('/order_day', 'OrdersController@day')->name('order.day')->middleware(['permission:orders']);
Route::get('/order_menu', 'OrdersController@menu')->name('order.menu')->middleware(['permission:orders']);
Route::get('/order_menum', 'OrdersController@menu_month')->name('order.menu_month')->middleware(['permission:orders']);
Route::get('/order_mday', 'OrdersController@mday')->name('order.mday')->middleware(['permission:orders']);
//权限的资源路由
Route::resource('/permission','PermissionsController');//->middleware(['role:RBAC|大老板(为所欲为)']);
//角色的资源路由
Route::resource('/role','RoleController');//->middleware(['role:RBAC|大老板(为所欲为)']);
//导航菜单的资源路由
Route::resource('/nav','NavsController');
//抽奖活动的资源路由
Route::resource('/event','EventsController');
Route::get('/event_lottery/{event}','EventsController@lottery')->name('event.lottery');
//抽奖活动 奖品
Route::resource('/event_prize','Event_prizesController');
//活动报名表
Route::resource('/event_member','EventMembersController');

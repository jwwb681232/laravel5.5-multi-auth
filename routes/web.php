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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function($route){
    //region 登录退出
    $route->get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    $route->post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    $route->get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    //endregion

    //region 重置密码
    $route->post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    $route->get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    $route->post('/password/reset','Auth\AdminResetPasswordController@reset');
    $route->get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    //endregion
});

Route::group(['middleware' => 'auth:admin','prefix'=>'admin'],function($route){
    //仪表盘
    $route->get('/', 'AdminController@index')->name('admin.dashboard');
    //测试
    $route->get('test', 'AdminController@test');
});


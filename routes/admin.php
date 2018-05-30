<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:26
 */

//region 登录退出
Route::get('login','\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('login');
Route::post('login','\App\Http\Controllers\Auth\AdminLoginController@login')->name('login.submit');
Route::get('logout','\App\Http\Controllers\Auth\AdminLoginController@logout')->name('logout');
//endregion

//region 重置密码
Route::post('password/email','\App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset','\App\Http\Controllers\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset','\App\Http\Controllers\Auth\AdminResetPasswordController@reset');
Route::get('password/reset/{token}','\App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm')->name('password.reset');
//endregion

Route::group(['middleware' => 'auth:admin'],function($route){
    //主页跳转
    $route->get('/', 'IndexController@index')->name('index');
    //测试
    $route->get('test', 'TestController@index')->name('test');
    //主页
    $route->get('index', 'IndexController@index')->name('index');
    //仪表盘
    $route->get('dashboard', 'DashboardController@index')->name('dashboard');
    //后台用户
    $route->resource('admin-users', 'AdminUsersController');
    //角色
    $route->resource('roles', 'RolesController');
    //region Permissions 权限
    $route->resource('permissions', 'PermissionsController');
    //endregion
});
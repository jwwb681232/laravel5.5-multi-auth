<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:26
 */

//region 登录退出
Route::get('login','\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('login','\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('logout','\App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');
//endregion

//region 重置密码
Route::post('password/email','\App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset','\App\Http\Controllers\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/reset','\App\Http\Controllers\Auth\AdminResetPasswordController@reset');
Route::get('password/reset/{token}','\App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::group(['middleware' => 'auth:admin'],function($route){
    //仪表盘
    $route->get('test', 'TestController@index')->name('admin.test');
    //仪表盘
    $route->get('/', 'AdminUsersController@index')->name('admin.dashboard');
    //后台用户
    $route->resource('admin-users', 'AdminUsersController');
    //角色
    $route->resource('roles', 'RolesController');
});
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


Route::get('/', 'Frontend\HomeController@index')->name('frontend.index');
Route::get('/set-locale', 'Frontend\HomeController@setLocale')->name('set-locale');

Auth::routes();

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::middleware(['auth:admin'])->prefix('admin')->group(function() {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.home');
    Route::Resource('language', 'Admin\LanguageController');
    Route::Resource('package', 'Admin\PackageController');
});

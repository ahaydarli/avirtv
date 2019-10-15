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

use App\Contact;

View::composer('admin.layout', function ($view) {
    $view->with('messages',  Contact::where('read',0)->get());
});

Route::get('/', 'Frontend\HomeController@index')->name('frontend.index');
Route::get('/faq', 'Frontend\HomeController@fag')->name('frontend.faq');
Route::get('/contact', 'Frontend\HomeController@contact')->name('frontend.contact');
Route::get('/set-locale', 'Frontend\HomeController@setLocale')->name('set-locale');
Route::get("/about-us", 'Frontend\HomeController@about')->name("about");
Route::get("/pricing", 'Frontend\HomeController@pricing')->name("pricing");

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'Frontend\ProfileController@index');
    Route::get('/order/{package_id}', 'Frontend\OrderController@subscribe')->name('order.subscribe');

});

Auth::routes();

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::middleware(['auth:admin'])->prefix('admin')->group(function() {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.home');
    Route::Resource('language', 'Admin\LanguageController');
    Route::Resource('package', 'Admin\PackageController');
    Route::Resource('faq', 'Admin\FaqController');
    Route::Resource('contact', 'Admin\ContactController');
    Route::Resource('about', 'Admin\AboutController');
});

Route::post("/send-message",'Frontend\HomeController@sendMessage')->name('frontend.sendMessage');
Route::post('/readmessage','Admin\AdminController@readMessage');



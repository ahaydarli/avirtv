<?php

namespace App\Providers;

use App\Contact;
use App\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!\session()->exists('locales')) {
            $locales = Language::all();
            \session(['locales' => Language::all()]);
        }
        View::composer(['layout', 'login-layout'], function ($view) {
            $view->with('languages', \session('locales'));
        });
        View::composer('admin.layout', function ($view) {
            $view->with('messages',  Contact::where('read',0)->get());
        });
        Schema::defaultStringLength(191);
    }
}

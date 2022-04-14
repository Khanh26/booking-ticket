<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use App\Models\Member;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\View;

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
        view()->composer('*', function ($view) {
            $user = array();
            if (Session::has('loginUsername')) {
                $user = Member::where('USERNAME', '=', Session::get('loginUsername'))->first();
            }
            $view->with('user', $user);
        });
    }
}

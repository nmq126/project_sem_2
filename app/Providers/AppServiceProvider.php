<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class   AppServiceProvider extends ServiceProvider
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
        //
        view()->composer('*',function ($view){
            $shoppingCart = [];
            if (Session::has('shoppingCart')) {
                $shoppingCart = Session::get('shoppingCart');
            }
            $totalQuantity = 0;
            foreach ($shoppingCart as $cartItem){
                $totalQuantity += $cartItem->quantity;
            }
            $view->with('totalQuantity', $totalQuantity);
        });

        View::share('numberAlert', Notification::numberAlert());
    }
}

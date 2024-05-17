<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Menu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Menu::macro('main',function (){
            return Menu::new()
                    ->addClass('sidebar-menu')
                    ->route('dashboard', 'Dashboard')->addClass('nav-item');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

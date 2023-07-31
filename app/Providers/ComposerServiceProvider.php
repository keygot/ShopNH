<?php

namespace App\Providers;

use App\Composers\CartComposer;
use App\Composers\CategoryComposer;
use App\Composers\ProductComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('client.layouts.app', CategoryComposer::class);
        View::composer('client.layouts.app', CartComposer::class);
        View::composer('client.carts.index', ProductComposer::class);
    }
}

<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class DiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class,


        );
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,

        );
        $this->app->bind(
            \App\Repositories\ImageProduct\ImageProductRepositoryInterface::class,
            \App\Repositories\ImageProduct\ImageProductRepository::class,

        );

    }
}


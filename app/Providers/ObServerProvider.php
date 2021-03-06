<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\TaskObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
      /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);

    }
}

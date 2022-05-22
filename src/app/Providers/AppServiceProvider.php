<?php

namespace App\Providers;

use App\Actions\Films\FilmsIndexAction;
use App\Actions\Films\FilmsStoreAction;
use App\Actions\Films\FilmsUpdateAction;
use App\Contracts\Actions\FilmsIndexActionContract;
use App\Contracts\Actions\FilmsStoreActionContract;
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
        $this->app->bind(FilmsIndexActionContract::class, FilmsIndexAction::class);
        $this->app->bind(FilmsStoreActionContract::class, FilmsStoreAction::class);
        $this->app->bind(FilmsUpdateAction::class, FilmsUpdateAction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

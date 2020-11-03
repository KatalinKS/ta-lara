<?php

namespace App\Providers;

use App\Product\Property\Adapters\PropertyRepositoryForTest;
use App\Product\Property\Intefaces\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepositoryRepository::class, \App\Repositories\ProductRepositoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductLocaleRepository::class, \App\Repositories\ProductLocaleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LocaleRepository::class, \App\Repositories\LocaleRepositoryEloquent::class);
        $this->app->bind(Repository::class, PropertyRepositoryForTest::class);
        //:end-bindings:
    }
}

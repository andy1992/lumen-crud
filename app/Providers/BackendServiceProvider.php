<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
    public function register() {    
        $this->app->bind('App\Repositories\Product\ProductRepositoryInterface', 'App\Repositories\Product\DbProductRepository');
        $this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\DbUserRepository');
    }
}

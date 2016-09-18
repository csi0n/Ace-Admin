<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MenuRepository', function ($app) {
            return new \App\Repositories\Admin\MenuRepository($app);
        });
        $this->app->singleton('PermissionRepository', function ($app) {
            return new \App\Repositories\Admin\PermissionRepository($app);
        });
        $this->app->singleton('RoleRepository', function ($app) {
            return new \App\Repositories\Admin\RoleRepository($app);
        });
        $this->app->singleton('UserRepository', function ($app) {
            return new \App\Repositories\Admin\UserRepository($app);
        });
    }
}

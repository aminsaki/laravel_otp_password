<?php

namespace UserAuth\laravelMobileAuth\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use UserAuth\laravelMobileAuth\LaravelMobileAuth;

class LaravelMobileAuthServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/LaravelMobileAuth.php', 'laravelMobileConfig');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getLoadRoutesFrom();

        $this->getLoadViewsFrom();

        $this->getPublishesConfig();

        $this->getPublishesPublic();
        $this->getLoadMigrationsFrom();
    }

    /**
     * @return void
     */
    private function getLoadRoutesFrom(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * @return void
     */
    private function getLoadViewsFrom(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-mobile-auth');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-mobile-auth')
        ], 'laravel_mobile_auth_views');
    }

    /**
     * @return void
     */
    private function getLoadMigrationsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * @return void
     */
    private function getPublishesConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/LaravelMobileAuth.php' => config_path('laravel-mobile-auth.php')
        ], 'laravel_mobile_auth');
    }

    /**
     * @return void
     */
    private function getPublishesPublic(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('vendor/laravel-mobile-auth/css')
        ], 'laravel_mobile_auth_css');
    }
}

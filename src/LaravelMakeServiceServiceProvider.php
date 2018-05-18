<?php

namespace Artogrig\LaravelMakeService;

use Artogrig\LaravelMakeService\Console\Commands\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

class LaravelMakeServiceServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'artogrig');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'artogrig');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/laravelmakeservice.php' => config_path('laravelmakeservice.php'),
            ], 'laravelmakeservice.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/artogrig'),
            ], 'laravelmakeservice.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/artogrig'),
            ], 'laravelmakeservice.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/artogrig'),
            ], 'laravelmakeservice.views');*/

            // Registering package commands.
            // $this->commands([]);

            $this->commands([
                ServiceMakeCommand::class
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelmakeservice.php', 'laravelmakeservice');

        // Register the service the package provides.
        $this->app->singleton('laravelmakeservice', function ($app) {
            return new LaravelMakeService;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelmakeservice'];
    }
}
<?php

namespace Bantenprov\AngkaMelekHuruf;

use Illuminate\Support\ServiceProvider;
use Bantenprov\AngkaMelekHuruf\Console\Commands\AngkaMelekHurufCommand;

/**
 * The AngkaMelekHurufServiceProvider class
 *
 * @package Bantenprov\AngkaMelekHuruf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AngkaMelekHurufServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('angka-melek-huruf', function ($app) {
            return new AngkaMelekHuruf;
        });

        $this->app->singleton('command.angka-melek-huruf', function ($app) {
            return new AngkaMelekHurufCommand;
        });

        $this->commands('command.angka-melek-huruf');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'angka-melek-huruf',
            'command.angka-melek-huruf',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('angka-melek-huruf.php');

        $this->mergeConfigFrom($packageConfigPath, 'angka-melek-huruf');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'angka-melek-huruf-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'angka-melek-huruf');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/angka-melek-huruf'),
        ], 'angka-melek-huruf-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'angka-melek-huruf');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/angka-melek-huruf'),
        ], 'angka-melek-huruf-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'angka-melek-huruf-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'angka-melek-huruf-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'angka-melek-huruf-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'angka-melek-huruf-seeds');
    }
}

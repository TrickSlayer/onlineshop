<?php

namespace Trick\Timezones\Provider;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '\..\router\routes.php';
        $this->app->make('Trick\Timezones\Controller\TimezonesController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '\..\views', 'timezones');
        $this->publishes([
            __DIR__ . '\..\views' => base_path('resources\views\trick\timezones'),
        ]);
    }
}

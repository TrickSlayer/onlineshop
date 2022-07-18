<?php

namespace Trick\Upload\Provider;

use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '\..\router\routes.php';
        $this->app->make('Trick\Upload\Controller\UploadController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}

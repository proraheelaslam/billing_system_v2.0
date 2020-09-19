<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\CustomLogs;

class LogsCustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\CustomLogs', function ($app) {
            return new CustomLogs();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

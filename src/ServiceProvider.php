<?php

namespace ThinkQR;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/thinkqr.php' => config_path('thinkqr.php'),
            ], 'config');


            $this->commands([
                //
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/thinkqr.php', 'thinkqr');
    }
}

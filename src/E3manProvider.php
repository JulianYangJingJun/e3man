<?php
namespace e3man\e3man;

use Illuminate\Support\ServiceProvider;

class E3manProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/e3man.php' => base_path('config/e3man.php'),
        ]);
    }
    // /**
    //  * Register the application services.
    //  *
    //  * @return void
    //  */
    // public function register()
    // {
    //     $this->app->singleton('e3man', function ($app) {
    //         return new E3man($app['config']);
    //     });
    // }
}

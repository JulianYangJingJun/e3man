<?php
namespace e3man\e3manServiceProvider;

use Illuminate\Support\ServiceProvider;

class e3manServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        

        $this->publishes([        
            __DIR__.'/config/E3.php' => config_path('E3.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('e3man', function ($app) {
            return new Packagetest($app['session'], $app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['packagetest'];
    }
}

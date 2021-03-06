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
            __DIR__ . '/commands/e3man.php' => base_path('app/Console/Commands/e3man.php'),
        ]);
    }
}

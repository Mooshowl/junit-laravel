<?php
namespace Jehu\JunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class JunitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'junit'
        );
    }

    private function routeConfiguration()
    {
        return [
            'namespace' => 'Jehu\JunitLaravel\Http\Controllers',
            'prefix' => 'junit',
        ];
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }
}
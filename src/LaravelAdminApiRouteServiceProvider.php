<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:59 AM
 */

namespace csi0n\LaravelAdminApi;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class LaravelAdminApiRouteServiceProvider extends RouteServiceProvider
{
    protected $namespace = 'csi0n\LaravelAdminApi\System\Http\Controllers';

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }


    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

    }

    protected function mapApiRoutes()
    {
        Route::prefix('laravel-admin-api/api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/api.php');
    }

    protected function mapWebRoutes()
    {

    }
}
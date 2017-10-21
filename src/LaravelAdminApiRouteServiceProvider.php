<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:59 AM
 */

namespace csi0n\LaravelAdminApi;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class LaravelAdminApiRouteServiceProvider extends RouteServiceProvider
{
    protected $namespace = 'csi0n\LaravelAdminApi\System\Http\Controllers';

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->authApiRoutes();

    }

    protected function mapApiRoutes()
    {
        Route::prefix(config('laravel-admin-api.prefix'))
            ->middleware(config('laravel-admin-api.otherMiddleware'))
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/api.php');
    }

    protected function mapWebRoutes()
    {

    }


    private function authApiRoutes()
    {
        Route::prefix(config('laravel-admin-api.prefix'))
            ->middleware(config('laravel-admin-api.authMiddleware'))
            ->post('login', [
                'uses' => $this->namespace . '\LoginController@login',
                'as' => 'login'
            ]);
        Route::prefix(config('laravel-admin-api.prefix'))
            ->middleware(config('laravel-admin-api.authMiddleware'))
            ->get('logout', [
                'uses' => $this->namespace . '\LoginController@logout',
                'as' => 'logout'
            ]);
    }
}
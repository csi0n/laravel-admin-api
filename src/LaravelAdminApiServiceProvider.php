<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:07 AM
 */

namespace csi0n\LaravelAdminApi;


use csi0n\Laravel\Datatables\Facades\CLaravelDatatablesFacade;
use csi0n\Laravel\Datatables\Providers\CLaravelDatatablesServiceProvider;
use csi0n\Laravel\Request\Facades\CLaravelRequestFacade;
use csi0n\Laravel\Request\Providers\CLaravelRequestServiceProvider;
use Illuminate\Support\ServiceProvider;
use Mews\Captcha\CaptchaServiceProvider;
use Mews\Captcha\Facades\Captcha;
use Zizaco\Entrust\EntrustFacade;
use Zizaco\Entrust\EntrustServiceProvider;

class LaravelAdminApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    protected $registerServiceProviders = [
        CLaravelDatatablesServiceProvider::class,
        CLaravelRequestServiceProvider::class,
        CaptchaServiceProvider::class,
        EntrustServiceProvider::class,
    ];

    protected $aliases = [
        'CRule' => CLaravelRequestFacade::class,
        'DatatablesRepository' => CLaravelDatatablesFacade::class,
        'Captcha' => Captcha::class,
        'Entrust' => EntrustFacade::class,
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServiceProvider();

        $this->registerFacades();

        $this->mergeConfig();
    }

    private function registerServiceProvider()
    {
        foreach ($this->registerServiceProviders as $registerServiceProvider) {
            $this->app->register($registerServiceProvider);
        }
    }

    private function registerFacades()
    {
        foreach ($this->aliases as $k => $alias) {
            $this->app->alias($k, $alias);
        }
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/System/Config/config.php', 'laravel-admin-api'
        );
    }


    public function provides()
    {
        return [];
    }

}
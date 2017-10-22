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
        LaravelAdminApiRouteServiceProvider::class
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

        $this->publishConfig();

        $this->publishMigrations();

        $this->publishSeeds();
    }

    private function registerServiceProvider()
    {
        foreach ($this->registerServiceProviders as $registerServiceProvider) {
            $this->app->register($registerServiceProvider);
        }
    }

    private function registerFacades()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        foreach ($this->aliases as $k => $alias) {
            $loader->alias($k, $alias);
        }
    }


    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../configs/config.php' => config_path('laravel-admin-api.php'),
            __DIR__ . '/../configs/config-entrust.php' => config_path('entrust.php'),
        ]);
    }

    private function publishMigrations()
    {
        $this->publishes([
	        __DIR__ . '/../database/migrations/users_table' => database_path('migrations/2017_10_09_000000_create_users_table.php'),
            __DIR__ . '/../database/migrations/menus_table' => database_path('migrations/2017_10_09_000010_create_menus_table.php'),
            __DIR__ . '/../database/migrations/rbac_setup_tables' => database_path('migrations/2017_10_09_000020_create_rbac_setup_tables.php'),
        ]);
    }

    private function publishSeeds()
    {
        $this->publishes([
            __DIR__ . '/../database/seeds/MenusSeeder' => database_path('seeds/MenusSeeder.php'),
            __DIR__ . '/../database/seeds/PermissionsSeeder' => database_path('seeds/PermissionsSeeder.php'),
            __DIR__ . '/../database/seeds/RolesSeeder' => database_path('seeds/RolesSeeder.php'),
            __DIR__ . '/../database/seeds/UsersSeeder' => database_path('seeds/UsersSeeder.php')
        ]);
    }


    public function provides()
    {
        return [];
    }

}
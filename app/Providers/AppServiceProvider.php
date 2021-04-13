<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\ModuleAppAdministration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view)
        {
            $moduloAdminApp = new ModuleAppAdministration();
            $estados = $moduloAdminApp->estadoApp();
            $view->with('estados', $estados);
        });
    }
}

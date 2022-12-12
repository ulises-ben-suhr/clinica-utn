<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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

        Gate::define('puede_borrar_pacientes', function($usuario){
            return $usuario->rol == 'ADMINISTRADOR';
        });
        Gate::define('puede_programar_turnos', function(){
            return true;
        });
    }
}

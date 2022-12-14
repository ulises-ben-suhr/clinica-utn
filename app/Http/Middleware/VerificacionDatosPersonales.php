<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificacionDatosPersonales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!is_null($request->user()) && $request->user()->rol == 'PACIENTE'){


            $idRouteParam =  $request->route()->parameter('paciente');

            $pacienteID = session('pacienteID',0)->paciente_id;

            if($idRouteParam == $pacienteID){
                return $next($request);
            }else{
                abort(401);
            }
        }else{
            return $next($request);
        }

    }
}

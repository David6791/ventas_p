<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{

    public function handle($request, Closure $next)
    {

        if( Auth()->hasRole('administrar_usuarios')){
        //if(role('admin_horarios')){
            return $next($request);
        }else {
            //dd( 'hola');
            return redirect('home');
        }

    }
}

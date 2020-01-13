<?php

namespace sisPazySalvos\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TalentoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
       
        if(Auth::user()->rol=='Administrador')
        return redirect('sispazysalvos/docente');
        else if(Auth::user()->rol=='Talento-Humano')
        return $next($request);
        else if(Auth::user()->rol=='Caja')
        return redirect('caja/docents');
        else 
        return redirect('dependencia/pazysalvo');
    }

        return redirect('/login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfile
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
        if(auth()->user()->perfil == 1) {
            return $next($request);
        }
        return redirect('/admin/home')->with('erro', 'Você precisa completar seu perfil para ter acesso ao conteúdo!');
    }
}

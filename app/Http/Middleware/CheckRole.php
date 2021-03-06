<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if(auth()->user()->role == 0) {
            return $next($request);
        }
        return redirect('/admin/home')->with('erro', 'Você não tem permissão de acesso para esta página!');
    }
}

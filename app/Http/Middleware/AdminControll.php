<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminControll
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
        if (empty(Auth::user()->role) || !isset(Auth::user()->role->name) || !isset(Auth::user()->role) || Auth::user()->role->name !== 'Администратор') {
            return redirect('/');
        }
        return $next($request);
    }
}

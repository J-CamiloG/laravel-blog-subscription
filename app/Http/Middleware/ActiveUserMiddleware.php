<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->is_active) {
            session()->flash('error', 'Tu cuenta está desactivada. Contacta con el administrador.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
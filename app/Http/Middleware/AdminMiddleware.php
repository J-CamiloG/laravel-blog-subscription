<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            session()->flash('error', 'Acceso no autorizado. Solo administradores pueden acceder a esta sección.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
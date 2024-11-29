<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'admin') {
            return $next($request);
        }

        return redirect()->route('agendamentos.index')->with('error', 'Você não tem permissão para acessar esta página.');
    }
}

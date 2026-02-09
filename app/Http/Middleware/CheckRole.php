<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            return redirect('login');
        }

        // Verifica se o slug da role do usuário está entre as permitidas na rota
        foreach ($roles as $role) {
            if ($request->user()->roles->contains('slug', $role)) {
                return $next($request);
            }
        }

        abort(403, 'no permission');
    }
}

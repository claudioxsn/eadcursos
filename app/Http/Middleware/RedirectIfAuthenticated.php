<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        //  foreach ($guards as $guard) {
        //       if (Auth::guard($guard)->check()) {
        //           return redirect(RouteServiceProvider::HOME);
        //         }
        //     }

       foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                dd($guard);
                if ($guard == 'administrador') {
                    return redirect()->route('administrador.dashboard');
                } else if ($guard == 'aluno') {
                    return redirect()->route('aluno.dashboard');
                }
            }
        }
        return $next($request);
    }
}

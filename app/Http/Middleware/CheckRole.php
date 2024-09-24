<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User; 


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        /** @var User|null $user */
        // $user = auth()->user(); 

        // if ($user && $user->role && $user->role->name === $role) {
        //     return $next($request);
        // }
        // if (Auth::check() && Auth::user()->is_admin) {
        //     return $next($request);
        // }

        return redirect('/home')->with('error', "Vous n'avez pas accès à cette page.");
    }
}

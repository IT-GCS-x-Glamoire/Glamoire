<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // default code
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // } 

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        foreach ($roles as $role) {
            if ($user->role == $role) {
                return $next($request);
            }
        }

        // Store the current URL in the session before redirecting
        session(['last_page' => url()->previous()]);

        return response()->view('error-403', [], 403);
    }
}

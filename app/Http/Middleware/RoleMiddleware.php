<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Check if the user role matches the required role
        if ($user->role !== $role) {
            return redirect()->route('login'); // Redirect if role does not match
        }

        return $next($request);
    }
}

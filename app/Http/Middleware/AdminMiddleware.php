<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $user= $request->user();
        // dd($user);
        if (!$user || !in_array($user->role, [UserRole::Admin, UserRole::Superadmin], true)) {
            abort(403, 'Unauthorized');
         }
        return $next($request);
    }
    
}

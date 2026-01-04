<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if user is authenticated and is an instance of User model
        if (!$user instanceof User || !$user->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

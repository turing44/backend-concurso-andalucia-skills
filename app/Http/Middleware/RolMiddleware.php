<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolMiddleware
{
    
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();
        if (!$user || !in_array($user->rol, $roles)) {
            return response()->json(['message' => 'Acceso denegado'], 403);
        }

        return $next($request);

        
    }
}

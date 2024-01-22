<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthorizationHeader
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->header('Authorization')) {
            // Puedes retornar una respuesta personalizada o lanzar una excepción
            return response()->json(['error' => 'Authorization header not found'], 401);
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorizationHeader = $request->header('Authorization');
        $validKey = config('app.api_key');

        if (!$authorizationHeader || !str_starts_with($authorizationHeader, 'Bearer ')) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Missing or invalid Authorization header.'
            ], 401);
        }

        $apiKey = substr($authorizationHeader, 7);

        if ($apiKey !== $validKey) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Invalid API token.'
            ], 401);
        }

        return $next($request);
    }
}

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
        $apiKey = $request->header('API-KEY');
        $validKey = config('app.api_key');

        if (!$apiKey || $apiKey !== $validKey) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Invalid or missing API key.'
            ], 401);
        }

        return $next($request);
    }
}

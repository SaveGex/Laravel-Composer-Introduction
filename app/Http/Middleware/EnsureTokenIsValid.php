<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $origin = config("api.token");
        if($origin !== $request->headers->get("X-App-Token", "")){
            return response()->json([
                "message" => "Invalid token"
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}

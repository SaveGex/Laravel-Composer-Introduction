<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, int $minAge): Response
    {
        $userAge = $request->header('X-User-Age', 0);

        if ($userAge < $minAge) {
            return response()->json([
                'success' => false,
                'error' => 'Недопустимый возраст',
                'message' => "Возраст должен быть больше {$minAge}",
            ], 403);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        error_log(sprintf(
            "[%s]: %s %s | IP: %s, X-Real-Ip: %s, Host: %s",
            date('Y-m-d H:i:s'),
            $request->method(),
            $request->fullUrl(),
            $request->ip(),
            $request->header('X-Real-IP'),
            $request->header('Host')
        ));

        $startTime = microtime(true);

        $response = $next($request);

        $duration = round((microtime(true) - $startTime) * 1000, 2);

        error_log(sprintf(
            "[%s]: RESPONSE: Status: %d | DURATION: %s ms",
            date('Y-m-d H:i:s'),
            $response->getStatusCode(),
            $duration
        ));

        return $response;
    }
}

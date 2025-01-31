<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Services\ShortUrlLogService;
use Symfony\Component\HttpFoundation\Response;

class ShortUrlLogger
{
    private ShortUrlLogService $shortUrlLogService;

    public function __construct(ShortUrlLogService $shortenUrlLogService){
        $this->shortUrlLogService = $shortenUrlLogService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->shortUrlLogService->logEntry();
        return $next($request);
    }
}

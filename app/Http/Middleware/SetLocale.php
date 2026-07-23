<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', $request->cookie('locale', $request->cookie('lang')));

        if ($locale && in_array($locale, ['es', 'en', 'cat'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}

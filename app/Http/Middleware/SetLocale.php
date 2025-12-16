<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // mcamara handles locale via route prefix, but we also support session-based switching
        $locale = Session::get('locale');
        
        if ($locale && in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
        } elseif (!App::getLocale() || !in_array(App::getLocale(), ['en', 'ar'])) {
            // Fallback to default if mcamara didn't set it
            App::setLocale(config('app.locale', 'en'));
        }
        
        return $next($request);
    }
}

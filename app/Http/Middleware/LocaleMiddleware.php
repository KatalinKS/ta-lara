<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public static $mainLanguage = 'ru';

    public static $languages = ['en', 'ru', 'cs', 'de'];

    public static function getLocale(Request $request)
    {
        $uri = $request->path();


        $segmentsURI = explode('/',$uri);
        if (!empty($segmentsURI[1]) && in_array($segmentsURI[1], self::$languages)) {
            return $segmentsURI[1];
        }
        abort(404);
    }


    public function handle($request, Closure $next)
    {
        $locale = self::getLocale($request);
        if($locale) {
            App::setLocale($locale);
        } else {
            App::setLocale(self::$mainLanguage);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = 'en';

        if (cache()->get('lang')) {
            $lang = cache()->get('lang');
        } else {
            cache()->put('lang', $lang);
        }

        app()->setLocale($lang);

        return $next($request);
    }
}

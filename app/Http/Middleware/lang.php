<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('lang')){
            App::setLocale(session('lang'));
            Config::set('app.locale_prefix', session('lang'));
        }
        else{
            app()->setLocale('en');
            Config::set('app.locale_prefix', '');
        }
        return $next($request);
    }
}

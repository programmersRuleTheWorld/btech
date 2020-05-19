<?php

namespace App\Http\Middleware;

use Closure;

class CovidRedirect
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
        if(
            url()->current()!=route('covid.notice') && 
            url()->current()!=route('privacy') && 
            url()->current()!=route('covid.form') &&
            url()->current()!=route('about') &&
            url()->current()!=route('services')
            )
        return redirect()->route('covid.notice');
        else
        return $next($request);
    }
}

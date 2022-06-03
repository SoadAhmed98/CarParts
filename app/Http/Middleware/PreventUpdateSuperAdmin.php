<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventUpdateSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(array_values($request->route()->originalParameters())[0] == 1){ //get route parameter id in any module
            abort(403,'THIS ACTION IS UNUATHORIZED');
        }
        return $next($request);
    }
}

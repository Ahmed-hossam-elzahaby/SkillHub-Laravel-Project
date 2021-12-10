<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class canEnterDashbord
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

        $rolename = Auth::user()->role->name;
        if ($rolename == 'superadmin' or $rolename == 'admin') {

            return $next($request);
        } 

            abort(403);
        
    }
}

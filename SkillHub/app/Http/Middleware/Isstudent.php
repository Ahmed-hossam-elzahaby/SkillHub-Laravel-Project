<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Isstudent
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
        $studentrole = Role::where('name',  'student')->first();
        if (Auth::user()->role_id == $studentrole->id) {

            
        return $next($request);
        }
        abort(403);
    }
}

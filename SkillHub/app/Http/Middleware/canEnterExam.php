<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class canEnterExam
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
        $examid=$request->route()->parameter('id');
        $user=Auth::user();
        $pivotRow=$user->exams()->where('exam_id',$examid)->first();
        if($pivotRow !==null and $pivotRow->pivot->status=='closed'){
            return redirect(url("exams/show/$examid"));
        }
        return $next($request);
    }
}

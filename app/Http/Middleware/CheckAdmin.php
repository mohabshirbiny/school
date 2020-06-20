<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckAdmin
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

        if (!Auth::guest()) {
            if (Auth::user()->user_type == 'teacher'){
                return $next($request);
            }
            return abort(403);
        }
        return redirect('/');
    }
}

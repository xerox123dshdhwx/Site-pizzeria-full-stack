<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if($request->user()->isAdmin()){
            return $next($request);

        }else{
            abort(403,'You are not admin');
        }
    }
}

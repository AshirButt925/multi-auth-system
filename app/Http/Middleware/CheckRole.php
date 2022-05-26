<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {

        $user = Auth::user();
        if($user->type == $role){
            return $next($request);
        }
        /** there are two scenarios
         *  1. return redirect()->route("$user->type.home")
         *  2. abort('401');
         **/
        return redirect()->route("$user->type.home");
        abort('401');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class TypeAdmin
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
        $auth = auth()->user();
        $type_user = $auth->type_user->name;
        if($type_user != 'Administrador'){
            return response(['message'=>'Invalid data'], 400);
        }
        return $next($request);
    }
}

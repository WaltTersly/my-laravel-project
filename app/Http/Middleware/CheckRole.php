<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        // checks if a user has the proper role
        if ($request->user() == null) {
            return response("insuffient access rights", 401);
        }
        //$actions = $request->route()-> getAction();
        //$roles = isset($actions['roles']) ? $actions['roles'] : null;

        $roles = isset($roles) ? $roles : null;
        // if user has the requisite roll they are directed to the page
        if ($request->user()->hasanyrole($roles) || !$roles) {
            return $next($request);
        }
        //if they dint have the needed rights 
        return response("insuffient access rights", 401);
    }
        
    
}

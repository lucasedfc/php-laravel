<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(is_null($request->route('admin'))) {
            //return redirect('fruteria/apples');
            return redirect()->action('FruitsController@getApples')->withInput();
        }
        return $next($request);
    }
}

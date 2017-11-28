<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class BeforeCache
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

//        session(['gender' => $gender]);

        $parameters = $request->route()->parameters();

        $gender =  $parameters['slug'];


        $request->session()->put('gender', $gender);


//        dd($value = session('gender'));
        return $next($request);
    }
}

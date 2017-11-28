<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class TagMiddleware
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

        $parameters = $request->all();

        if(count($parameters)){

           $request->session()->put('tags',$parameters['style_id']);
        }else{

            $request->session()->forget('tags');

        }



        /*$gender = $request->session()->get('gender');

        $request->attributes->add(['gender' => $gender]);*/

        return $next($request);
    }
}

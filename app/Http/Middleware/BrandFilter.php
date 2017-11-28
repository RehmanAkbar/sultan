<?php

namespace App\Http\Middleware;

use Closure;

class BrandFilter
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

//            session(['brands' => $parameters['brand_ids']]);
            $request->session()->put('brand_ids', $parameters['brand_ids']);

        }else{
            $request->session()->forget('brands_ids');

        }

        return $next($request);
    }
}

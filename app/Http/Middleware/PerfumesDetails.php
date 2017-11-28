<?php

namespace App\Http\Middleware;

use Closure;

class PerfumesDetails
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

        $request->session()->forget('gender');
        $request->session()->forget('brand_ids');
        $request->session()->forget('tags');
        return $next($request);

    }
}

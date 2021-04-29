<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class ValidacionVisual 
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

        Log::info($request->header('token'));
        Log::info(config('google.visual_token'));

        if ($request->header('token') !== config('google.visual_token')) {
            return redirect('login')->withSuccess('Oppes! You have entered invalid token');
        }
        return $next($request);
    }
}


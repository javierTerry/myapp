<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\JwtController;
use Closure;
use Log;

class JsonWebToken
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
		Log::debug(print_r("Iniciando handle ".__FILE__,TRUE));
	 	$jwtController = new JwtController();
	 	
		$tmp = $jwtController -> getAuthenticatedToken() -> getData();
		Log::debug(print_r($tmp,TRUE));
		
		if (is_object( $tmp )){
			return $next($request);	
		}
		return $tmp;
	}
}

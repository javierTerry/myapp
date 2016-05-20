<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Log;

class VerifyCsrfToken extends BaseVerifier {
	
	
	protected $except = [
           'test/jwk/resource',
   ];

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//dd($request->is('test/jwk/resource'));
		
		foreach( $this-> except as $route )
        {
        	Log::debug(print_r($route,TRUE));
            if( $request->is( $route ) ) return $next($request);
        }

		return parent::handle($request, $next);
	}

}

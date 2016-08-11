<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Log;

class VerifyCsrfToken extends BaseVerifier {
	
	
	protected $except = [
           'api/dbadmins/upload',
           'api/dbadmins/upload/test'
           ,'api/dbadmins/respaldos/uploads'
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
		foreach( $this-> except as $route )
        {
        	Log::debug(print_r("Route ---> ".$route,TRUE));
			//Log::debug(print_r("dd ---> ".print_r($request,true),TRUE));
			
            if( $request-> is( $route ) ) return $next($request);
        }

		 return $next($request);
		//return parent::handle($request, $next);
	}

}

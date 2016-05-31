<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth	;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;



//date_default_timezone_set('America/Mexico_City');

class JwtController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		
        JWTAuth::parseToken();
		$token = JWTAuth::getToken();
		// and you can continue to chain methods
		$user = JWTAuth::parseToken()->authenticate();
		dd(JWTAuth::getPayload($token));
		 return ( response()->json($user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
	
	/**
     * Verify token.
     *
     * @return Response
     */
    public function getAuthenticatedToken()
    {
        try {
        	//JWTAuth::parseToken();
			Log::debug(print_r("Iniciando autenticacion",TRUE));
	        if (! $user = JWTAuth::parseToken()->authenticate()) {
	            return response()->json(['user_not_found'], 404);
	        }

	    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
			Log::debug(print_r("TokenExpiredException ---------->",TRUE));
			Log::debug(print_r($e,TRUE));
	        return(response()->json(['token_expired'], $e->getStatusCode()));
	
	    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
			Log::debug(print_r("TokenInvalidException ---------->",TRUE));
			Log::debug(print_r($e,TRUE));
	        return(response()->json(['token_invalid'], $e->getStatusCode()));
			
	
	    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
			Log::debug(print_r("JWTException ---------->",TRUE));
			Log::debug(print_r($e,TRUE));
			
	        return( response()->json(['token_absent'], $e->getStatusCode()));
	
	    } catch (\Exception $e) {
			Log::debug(print_r("Exception ---------->",TRUE));
			//Log::debug(print_r($e,TRUE));
	        return ( response()->json(['token_absent'], $e->getStatusCode()));
	
	    }
		Log::debug(print_r("Return token success ---------->",TRUE));
    	// the token is valid and we have found the user via the sub claim
		return( response()->json(compact('user')));
    }
    
    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request)
	{
	/*	foreach( $this-> except as $route )
        {
        	Log::debug(print_r("Route ---> ".$route,TRUE));
            if( $request->is( $route ) ) return $next($request);
        }

		return parent::handle($request, $next);
	 */
	 dd($this -> getAuthenticatedToken());
	// return "exito";
	}
	
}

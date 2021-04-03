<?php

  

namespace App\Http\Controllers;

  

use App\Http\Controllers\Controller;

use Socialite;

use Auth;

use Exception;

use App\User;

  

class GoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

      

    /**

     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()

    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect('/infra/dcs');

            }else{

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('null')

                ]);

    

                Auth::login($newUser);

     

                return redirect('/infra/dcs');

            }

    

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }


    public function logout() {
        #Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
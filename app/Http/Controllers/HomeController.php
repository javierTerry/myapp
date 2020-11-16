<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		#$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		

		#dd(config('google'));
		$sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name'))
                        ->all();
		
        #dd($sheets);

        #$sheets = Sheets::spreadsheet('1dNDvTgu0L-zYu7KNbGGNsVIEZOyS1AHQaLv59qEbhjY')->sheet('laravel') ->all();

        #	$sheets->spreadsheet('1dNDvTgu0L-zYu7KNbGGNsVIEZOyS1AHQaLv59qEbhjY')->sheet('laravel')->all();
        	
         #dd($sheets);               
		
        Sheets::sheet(config('google.sheet_name'))
        	->append([['3', 'name3', 'mail3']]);
		return view('app');
	}

}


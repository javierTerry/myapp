<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Revolution\Google\Sheets\Facades\Sheets;
use App\Model\Infra\DatacenterView;


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
		
		return view('app');
	}


    /**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function up_sheet()
	{
		#dd(config('google'));


		$sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name'));
        #                ->get();
        $header = $sheets ->get() ->pull(0);
		
        #$header = $sheets->pull(0); 
        #Sheets::sheet(config('google.sheet_name'))
        #	->clear();

        $values = DatacenterView::all()->toArray();
        
        #array_unshift($values,$header);
        #dd($values);

        #$values =  [$header, ['1','dos', 'tres']];
		#$values = [['name' => 'name4', 'mail' => 'mail4', 'id' => 4]];

		#dd($values);
		$tmp= Sheets::sheet(config('google.sheet_name'))
        	->collection($header,$values)
        	->all();
        
        Sheets::sheet(config('google.sheet_name'))
        	->append($tmp);

        
        return view('app');
	}

}

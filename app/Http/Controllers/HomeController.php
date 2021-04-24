<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Redirect;

use Revolution\Google\Sheets\Facades\Sheets;
use App\Model\Infra\ValidacionVisual;


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
    public function __construct(Request $request)
    {
        $this->middleware('visual');
    }


    /**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function up_sheet(Request $request)
	{
        Log:info("HOMECONTROLLER up_sheet");

       

		$sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name'));
        
        $cabecera = $sheets ->first();
		
        #dd($header);
        $values = ValidacionVisual::all()->toArray();
        
        $cabeceraAssoc= array();

        foreach ($cabecera as $key => $value) {
        	$cabeceraAssoc[$value] = $value;	
        }
        $cabeceraArray[0] = $cabeceraAssoc;
        #dd($cabeceraArray);

        
        Sheets::sheet(config('google.sheet_name'))
        	->clear();


        #$tmp= Sheets::sheet(config('google.sheet_name'))
        #	->collection($cabecera,$values)
        #	->toArray()
        #	;
        $tmp = array_merge($cabeceraArray, $values);	
        #dd($tmp);
        Sheets::sheet(config('google.sheet_name'))
        	->append($tmp);

        
        return view('login');
	}

}


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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function activo(Request $request)
	{
        Log::info("HOMECONTROLLER activo");

       

		$sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name'));
        
        $cabecera = $sheets ->first();
		
        $values = ValidacionVisual::where('inventario', 1)
                        ->orderByDesc('id')
                        ->get()
                        ->toArray();
        $cabeceraAssoc= array();

        foreach ($cabecera as $key => $value) {
        	$cabeceraAssoc[$value] = $value;	
        }
        $cabeceraArray[0] = $cabeceraAssoc;
        
        Sheets::sheet(config('google.sheet_name'))
        	->clear();


        $tmp = array_merge($cabeceraArray, $values);	
  
        Sheets::sheet(config('google.sheet_name'))
        	->append($tmp);

        
        return view('login');
	}



    /**
     * Funcion para obtener el inventario inactivo, mismo que no esta rackeado y peude estar en las oficinas centrales
     *
     * @return Response
     */
    public function inactivo(Request $request)
    {
        Log::info("HOMECONTROLLER inactivo");

        $sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name_inactivo'));
        
        $cabecera = $sheets ->first();       
        $values = ValidacionVisual::where('inventario', 2)
                        ->orderByDesc('id')
                        ->get()
                        ->toArray();
        
        $cabeceraAssoc= array();

        foreach ($cabecera as $key => $value) {
            $cabeceraAssoc[$value] = $value;    
        }
        $cabeceraArray[0] = $cabeceraAssoc;
        

        Sheets::sheet(config('google.sheet_name_inactivo'))
            ->clear();


        $tmp = array_merge($cabeceraArray, $values);    
        Sheets::sheet(config('google.sheet_name_inactivo'))
            ->append($tmp);

        return view('login');
    }


    /**
     * Obtiene los registros que son hisotricos equipos regresados al cliente o eliminados o destruidos.
     * @el inventario se tiene como valores 1 = Activo, 2 = inactvio, 3 = historico 
     *
     * @return Response
     */
    public function historico(Request $request)
    {
        Log::info("HOMECONTROLLER historico");

        $sheets = Sheets::spreadsheet(config('google.spreadsheet_id'))
                        ->sheet(config('google.sheet_name_historico'));
        
        $cabecera = $sheets ->first();
        $values = ValidacionVisual::where('inventario', 3)
                        ->orderByDesc('id')
                        ->get()
                        ->toArray();
        
        $cabeceraAssoc= array();

        foreach ($cabecera as $key => $value) {
            $cabeceraAssoc[$value] = $value;    
        }
        $cabeceraArray[0] = $cabeceraAssoc;
       
        Sheets::sheet(config('google.sheet_name_historico'))
            ->clear();

         $tmp = array_merge($cabeceraArray, $values);    
        
        Sheets::sheet(config('google.sheet_name_historico'))
            ->append($tmp);

        
        return view('login');
    }
}


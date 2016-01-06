<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Log;

use App\User;
use App\Model\Area;
use App\Model\Rol;
use App\Model\Puesto;
use App\Http\Requests\CrearUserRequest;

class UsersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users = User::nombre($request->get('name'))
							->email($request->get('email'))
							->paginate();
		
		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tmpRoles = Rol::lists('desc_rol','clave_rol')->toArray();
		$tmpAreas = Area::lists('desc_area','clave_area')->toArray();
		$tmpPuestos= Puesto::lists('desc_puesto','clave_puesto')->toArray();
	/*	 
		//$listRoles =  (empty($tmpRoles)) ? array() : $tmpRoles -> toArray(); //$tmpRoles->toArray() ;
		$listAreas =  (empty($tmpAreas)) ? array() : $tmpAreas -> toArray();
		$listPuestos =  (empty($tmpRoles)) ? array() : $tmpPuestos ->toArray() ;
		*/
		$roles 	= array_merge(array("" => "Seleccionar"), $tmpRoles);
		$areas 	= array_merge(array("" => "Seleccionar"), $tmpAreas);
		$puestos= array_merge(array("" => "Seleccionar"), $tmpPuestos);

		return view('admin.users.crear', compact('roles','areas','puestos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearUserRequest $request)
	{
		$apellido = explode(" ", $request->get('apellidos'));
		$nombre = explode(" ", $request->get('name'));
		$email = strtolower($nombre[0].".".$apellido[0])."@prueba.com";
		$dateIng = \Carbon\Carbon::parse($request->get('fecha_ing'));
		$dateBaja = \Carbon\Carbon::parse($request->get('fecha_baja'));
		$dateCmb = \Carbon\Carbon::parse($request->get('fecha_cambio'));
		//dd($date);
		Log::info('Usuario store');
		$usuario = new User($request->all());
		
		$usuario->email=$email;
		$usuario->password = \Hash::make('pass');
		$usuario->fecha_ing = $dateIng;
		$usuario->fecha_baja = $dateBaja;
		$usuario->fecha_cambio = $dateCmb;
		$usuario->save();
		
		$users = User::paginate();
		$notices = array('Usuario creado',"  Email; $email ","Agregado en ActiveDirectory", "Nomina Agregada");
		return view('admin.users.index', compact('users','notices'));
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
		Log::info('Usuario editar id: '.$id);
		$user = User::findOrFail($id);
		//dd();
		$roles = Rol::lists('desc_rol',"clave_rol");
		$areas 	= Area::lists('desc_area','clave_area');
		$puestos= Puesto::lists('desc_puesto','clave_puesto');
		return view('admin.users.editar', compact('user','roles','areas','puestos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CrearUserRequest $request)
	{
		Log::info('Usuario actualizar id: '.$id);
		$user = User::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$user->fill($request->all());
		Log::info("Fill  exito");
		$user->save();
		Log::info("Save exito");
		$users = User::paginate();
		return view('admin.users.index', compact('users'))->with('notice',"Usuario Actualizado");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		$users = User::paginate();
		return view('admin.users.index', compact('users'))->with('notice',"Usuario eliminado");
	}

}

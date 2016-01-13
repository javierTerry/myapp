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
		$roles = Rol::lists('desc_rol','clave_rol')->toArray();
		$areas = Area::lists('desc_area','clave_area')->toArray();
		$puestos= Puesto::lists('desc_puesto','clave_puesto')->toArray();

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
		$usuario->password = \Hash::make('T3mp0r41');
		$usuario->fecha_ing = $dateIng;
		$usuario->fecha_baja = $dateBaja;
		$usuario->fecha_cambio = $dateCmb;
		$usuario->save();
		
		$users = User::paginate();
		$notices = array('Usuario creado',"  Email: $email ","Agregado en ActiveDirectory", "Nomina Agregada");
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
		$dateIng = \Carbon\Carbon::parse($request->get('fecha_ing'));
		$dateBaja = \Carbon\Carbon::parse($request->get('fecha_baja'));
		$dateCmb = \Carbon\Carbon::parse($request->get('fecha_cambio'));
		$user = User::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$user->fill($request->all());
		Log::info("Fill  exito");
		$user->fecha_ing = $dateIng;
		$user->fecha_baja = $dateBaja;
		$user->fecha_cambio = $dateCmb;
		$user->save();
		Log::info("Save exito");
		$users = User::paginate();
		return view('admin.users.index', compact('users'))->with('notices',array("Usuario Actualizado"));
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
		$email = $user -> email;
		$user-> delete();
		$users = User::paginate();
		
		$notices = array('Usuario eliminado con',"  Email: $email ","Eliminado del activeDirectory", "Nomina Eliminada");
		return view('admin.users.index', compact('users','notices'));
	}

}

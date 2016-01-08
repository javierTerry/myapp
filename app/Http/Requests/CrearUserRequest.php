<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'		=> 'required'
			,'apellidos'=> 'required'
			,'rfc'		=> 'required|min:12'
			,'direccion'=> 'required'
			,'jefe_inmediato'=> 'required'
			,'fecha_ing'=> 'required'
			,'tel_casa'=> 'numeric'		
			,'clave_area'=> 'required'
			,'clave_puesto'=> 'required'
			,'clave_rol'=> 'required'
			
		];
	}

}

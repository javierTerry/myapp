<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearBPORequest extends Request {

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
			'proyecto'		=> 'required'
			,'cliente'		=> 'required'
			,'proveedor'	=> 'required'
			,'costocompro'	=> 'required'
			,'fechaini'		=> 'required'
			,'fechafin'		=> 'required'
			,'fechacompra'		=> 'required'
			,'costoreal'		=> 'required'
			,'precioventa'		=> 'required'
			,'avance'		=> 'required'
			
			
			
		];
	}

}

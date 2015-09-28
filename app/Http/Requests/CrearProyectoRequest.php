<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearProyectoRequest extends Request {

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
			'plataforma'	=> 'required'
			,'ingresos'	=> 'required'
			,'grossmar'			=> 'required|min:12'
			,'ebitda'=> 'required'
			,'grossideal'=> 'required'
			,'ebitdaideal'=> 'required'
			,'fecha_ing'=> 'required'
			
		];
	}

}

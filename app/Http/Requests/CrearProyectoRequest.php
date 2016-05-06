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
		$this->sanitize();
		return [
			'plataforma'	=> 'required'
			,'ingresos'		=> 'required'
			,'grossmar'		=> 'required'
			,'ebitda'=> 'required'
			,'grossideal'=> 'required'
			,'ebitdaideal'=> 'required'
			,'fecha_ing'=> 'required'
			
		];
	}
	
	
	/**
	 * Clean Request.
	 *
	 * @return array of type App\Http\Requests\Request
	 */
	public function sanitize()
	{
		 $input = $this->all();


        $input['ingresos'] = str_replace(",", "", $input['ingresos']);
		$input['grossmar'] = str_replace(",", "", $input['grossmar']);

        $this->replace($input);
	}

}

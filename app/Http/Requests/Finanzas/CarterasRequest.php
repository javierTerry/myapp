<?php namespace App\Http\Requests\Finanzas;

use App\Http\Requests\Request;

class CarterasRequest extends Request {

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
		/*$this->sanitize();*/
		
		return [
			'archivo'	=> 'required'
			
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

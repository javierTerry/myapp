<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeguimientoRequest extends Request
{
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
            'avance_real' 		=> 'required|numeric'
            ,'avance_planeado'	=> 'required|numeric'
            ,'desviacion'		=> 'required|numeric'
            ,'fecha_de'			=> 'required'
            ,'fecha_hasta'		=> 'required'
            
        ];
    }
}

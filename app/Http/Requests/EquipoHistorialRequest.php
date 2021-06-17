<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Log;
use App\Model\Infra\EquipoHistorial;
use App\Model\Infra\Equipo;
use App\Model\Infra\Rack;


class EquipoHistorialRequest extends FormRequest
{
    #protected $redirectAction = ('Infra\EquipoController@edit',1);
    #protected $redirect = "http://mn-infra.com/homeblack/public/infra/equipo/2/edit";
    public $validator = null;
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
        #dd($this->method());

        return [
            'ticket' => 'required'
            ,'descripcion' => 'required'
        ];
    }


     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'ticket.required' => 'El :attribute es obligatorio.',
             'descripcion.required' => 'La :attribute es obligatorio.',
            
        ];
    }



    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }

}



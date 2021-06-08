<?php

namespace App\Http\Requests\Infra;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
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
            'hostname' => 'required'
            ,'serie' => 'required'
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
            'hostname.required' => 'El :attribute es obligatorio.',
             'serie.required' => 'La :attribute es obligatorio.',
            
        ];
    }
}



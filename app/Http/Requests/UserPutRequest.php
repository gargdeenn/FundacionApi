<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPutRequest extends FormRequest
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
            'name' => 'required',
            'cellphone' => 'required',
            'rol_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'name' => 'El nombre es requerido',
            'cellphone' => 'El número de teléfono es requerido',
            'rol_id' => 'El tipo de usuario es requerido'
        ];
    }
}

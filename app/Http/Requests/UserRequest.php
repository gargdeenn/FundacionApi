<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password' => 'required',
            'cellphone' => 'required',
            'email' => 'required',
            'rol_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'name' => 'El nombre es requerido',
            'password' => 'La contaseña es requerida',
            'cellphone' => 'El número de teléfono es requerido',
            'email' => 'El correo es requerido',
            'rol_id' => 'El tipo de usuario es requerido'
        ];
    }
}

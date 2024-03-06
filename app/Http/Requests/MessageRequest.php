<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'lastname' => 'required',
            'email' => 'required',
            'cellphone' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es requerido',
            'lastname' => 'El apellido es requerido',
            'email' => 'El correo electrónico es requerido',
            'cellphone' => 'El número de teléfono es requerido',
            'message' => 'El mensaje es requerido'
        ];
    }
}

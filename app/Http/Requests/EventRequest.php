<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_event_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title' => 'El titulo es requerido',
            'description' => 'La descripción es requerida',
            'image' => 'La ruta de la imagen es requerida',
            'type_event_id' => 'El tipo de evento es requerido'
        ];
    }
}

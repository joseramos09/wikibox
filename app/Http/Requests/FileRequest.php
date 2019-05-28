<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'name' => 'required|min:4',
            'description' => 'required',
            'file' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre Obligatorio',
            'name.min' => 'El nombre debe tener como minimo 4 caracteres',
            'description' => 'Descripcion Obligatoria',
            'file' => 'Archivos Obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre del Archivos',
            'description' => 'Descripcion del Archivos',
            'file' =>'Archivos Subidos'
        ];
    }
}

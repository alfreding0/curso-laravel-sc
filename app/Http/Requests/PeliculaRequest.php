<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaRequest extends FormRequest
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
            'nombre'        => 'required|string|min:3',
            'creador'       => 'required|string|min:3',
            'copias'        => 'required|integer',
            'genero_id'     => 'required|integer',
            'precio'        => 'required|numeric',
            'formato'       => 'required|string|min:3',
            'idioma'        => 'required|string|min:3'
        ];
    }
}

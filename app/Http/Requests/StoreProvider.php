<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProvider extends FormRequest
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
            'nombreEmpresa' => 'required|max:45',
            'direccion' => 'required|max:80',
            'paginaWeb' => 'max:45',
            'estado' => 'required|max:45'           
        ];
    }
}

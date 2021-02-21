<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRibbon extends FormRequest
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
            'white_ribbon_id' => 'required',
            'employee_id' => 'required',
            'nomenclatura' => 'required',
            'peso' => 'required',
            'largo' => 'required',
            'fechaInicioTrabajo' => 'required',
            'fechaFinTrabajo' => 'required',
            'horaInicioTrabajo' => 'required',
            'horaFinTrabajo' => 'required',
            'status' => 'required',
            'pesoUtilizado' => 'required',
            'observaciones' => 'max:255'
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBag extends FormRequest
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
            'nomenclatura' => 'required',
            'fechaInicioTrabajo' => 'required',
            'fechaFinTrabajo' => 'required',
            'horaInicioTrabajo' => 'required',
            'horaFinTrabajo' => 'required',
            'peso' => 'required',
            'clienteStock' => ['required', Rule::in(['CLIENTE', 'STOCK'])],
            'observaciones' => 'max:255',
            'status' => 'required',
            'cantidad'=> 'required',
            'tipoUnidad' => ['required', Rule::in(['MILLAR', 'CIENTO'])]
        ];
    }
}

<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class PlanillaRequest extends FormRequest
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
            'user' => 'required|exists:users,id',
            'year' => 'required|numeric',
            'number' => 'required',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'El campo :attribute es obligatorio.',
            'user.exists' => 'El campo :attribute debe ser valido y estar presente en el sistema.',
            'year.required' => 'El campo :attribute es obligatorio.',
            'year.numeric' => 'El campo :attribute debe ser un año valido.',
            'number.required' => 'El campo :attribute es obligatorio.',
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'docente/auxiliar',
            'year' => 'año',
            'number' => 'gestion',
            'from' => 'Desde',
            'to' => 'Hasta',
        ];
    }
}

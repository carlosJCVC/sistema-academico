<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
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
            'cod_sis' => 'required',
            'asignature' => 'required|exists:asignatures,id',
            'group' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'bodyclass' => 'required',
            'resourcesbody' => 'required',
            'observations' => 'nullable',
        ];
    }
}

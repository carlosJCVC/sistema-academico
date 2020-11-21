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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
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
                        'observations' => 'nullable|max:150',
                        'file' => 'nullable|file|mimes:pdf,txt|max:2048',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
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
                        'observations' => 'nullable|max:150',
                        'file' => 'nullable|file|mimes:pdf,txt|max:2048',
                    ];
                }
            default:
                break;
        }

        return [
            //
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'El campo :attribute es obligatorio.',
            'cod_sis.required' => 'El campo :attribute es obligatorio.',
            'asignature.required' => 'El campo :attribute es obligatorio.',
            'group.required' => 'El campo :attribute es obligatorio.',
            'date.required' => 'El campo :attribute es obligatorio.',
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
            'bodyclass.required' => 'El campo :attribute es obligatorio.',
            'resourcesbody.required' => 'El campo :attribute es obligatorio.',
            'observations.max' => 'El campo :attribute no debe ser mayor a 150 caracteres.',
            'user.exists' => 'El campo :attribute debe ser valido y estar presente en el sistema.',
            'asignature.exists' => 'El campo :attribute debe ser valido y estar presente en el sistema.',
            'file.file' => 'El campo :attribute debe ser un archivo valido.',
            'file.mimes' => 'El campo :attribute debe ser un archivo valido y ser :values.',
            'file.max' => 'El campo :attribute debe ser un archivo no mayor a :max kilobytes.',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'docente/auxiliar',
            'cod_sis' => 'codigo sis',
            'asignature' => 'materia',
            'group' => 'grupo',
            'date' => 'fecha',
            'from' => 'De',
            'to' => 'A',
            'bodyclass' => 'contenido de clase',
            'resourcesbody' => 'medios/plataforma',
            'observations' => 'observaciones',
            'file' => 'archivo opcional',
        ];
    }
}

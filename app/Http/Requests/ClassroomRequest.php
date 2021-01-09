<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
                        'user' => 'required|numeric',
                        'asignature' => 'required|numeric',
                        'date_suspended' => 'required',
                        'reason' => 'required|max:150',
                        'date_reposition' => 'required|after:date_suspended',
                        'from' => 'required',
                        'to' => 'required|after:from',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'user' => 'required|numeric',
                        'asignature' => 'required|numeric',
                        'date_suspended' => 'required',
                        'reason' => 'required|max:150',
                        'date_reposition' => 'required|after:date_suspended',
                        'from' => 'required',
                        'to' => 'required|after:from',
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
            'asignature.required' => 'El campo :attribute es obligatorio.',
            'date_suspended.required' => 'El campo :attribute es obligatorio.',
            'date_reposition.required' => 'El campo :attribute es obligatorio.',
            'reason.required' => 'El campo :attribute es obligatorio.',
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
            'reason.max' => 'El campo :attribute no debe ser mayor a 150 caracteres.',
            'user.numeric' => 'El campo :attribute debe ser un usuario valido.',
            'asignature.numeric' => 'El campo :attribute debe ser una materia valido.',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'docente/auxiliar',
            'asignature' => 'materia',
            'date_suspended' => 'fecha de clase suspendida',
            'date_reposition' => 'fecha de clase a reponer',
            'reason' => 'justificacion',
            'from' => 'Desde',
            'to' => 'Hasta',
        ];
    }
}

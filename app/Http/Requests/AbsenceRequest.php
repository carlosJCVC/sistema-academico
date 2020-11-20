<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenceRequest extends FormRequest
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
                        'date_absence' => 'required',
                        'reason' => 'required|max:150',
                        'from' => 'required',
                        'to' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'user' => 'required|numeric',
                        'date_absence' => 'required',
                        'reason' => 'required|max:150',
                        'from' => 'required',
                        'to' => 'required',
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
            'date_absence.required' => 'El campo :attribute es obligatorio.',
            'reason.required' => 'El campo :attribute es obligatorio.',
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
            'reason.max' => 'El campo :attribute no debe ser mayor a 150 caracteres.',
            'user.numeric' => 'El campo :attribute debe ser un usuario valido.',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'docente/auxiliar',
            'date_absence' => 'fecha de ausencia',
            'reason' => 'motivo/justificacion',
            'from' => 'De',
            'to' => 'A',
        ];
    }
}

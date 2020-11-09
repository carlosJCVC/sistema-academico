<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignatureGroupRequest extends FormRequest
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
                    'group' => 'required|numeric',
                    'asignature' => 'required|exists:asignatures,id',
                    'teachers' => 'required|array|min:1',
                    'teachers.*.key' => 'required|exists:users,id',
                    'teachers.*.from' => 'required|string',
                    'teachers.*.to' => 'required|string',
                    'teachers.*.day' => 'required|string',
                    'teachers.*.titular' => 'required|boolean',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'group' => 'required|numeric',
                    'asignature' => 'required|exists:asignatures,id',
                    'teachers' => 'required|array|min:1',
                    'teachers.*.key' => 'required|exists:users,id',
                    'teachers.*.from' => 'required|string',
                    'teachers.*.to' => 'required|string',
                    'teachers.*.day' => 'required|string',
                    'teachers.*.titular' => 'required|boolean',
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
            'group.required' => 'El campo :attribute es obligatorio.',
            'asignature.required' => 'El campo :attribute es obligatorio.',
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'group' => 'numero de grupo',
            'to' => 'A',
            'asignature' => 'materia',
            'from' => 'De',
            'day' => 'Dia',
        ];
    }
}

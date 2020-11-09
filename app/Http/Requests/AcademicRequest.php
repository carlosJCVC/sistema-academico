<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicRequest extends FormRequest
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
                    'name' => 'required|unique:academics|max:100',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:100',
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
            'name.required' => 'El campo :attribute es obligatorio.',
            'name.unique' => 'El campo :attribute ya esta registrado.',
            'name.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
        ];
    }
}

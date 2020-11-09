<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
                    'name' => 'required|unique:items|max:100',
                    'level' => 'max:100',
                    'teacher' => 'max:100',
                    'destine' => 'required|max:100',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:100',
                    'level' => 'max:100',
                    'teacher' => 'max:100',
                    'destine' => 'required|max:100',
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
            'level.required' => 'El campo :attribute es obligatorio.',
            'level.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'teacher.required' => 'El campo :attribute es obligatorio.',
            'teacher.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'destine.required' => 'El campo :attribute es obligatorio.',
            'destine.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'level' => 'Nivel',
            'teacher' => 'Docente',
            'destine' => 'Destino',
        ];
    }
}

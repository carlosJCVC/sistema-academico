<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignatureRequest extends FormRequest
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
        $year = $this->year;
        $gestion = $this->number;
        $name = $this->name;

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:100',
                        'year' => 'required|numeric',
                        'number' => [
                            'required',
                            Rule::unique('asignatures')->where(function ($query) use ($year, $name) {
                                $query->where([
                                    ['year', '=', $year],
                                    ['name', '=', $name],
                                ]);
                            })
                        ]
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:100',
                        'year' => 'required|numeric',
                        'number' => [
                            'required',
                            Rule::unique('asignatures')->ignore($this->asignature->id)->where(function ($query) use ($year, $name) {
                                $query->where([
                                    ['year', '=', $year],
                                    ['name', '=', $name],
                                ]);
                            })
                        ]
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
            'year.required' => 'El campo :attribute es obligatorio.',
            'number.required' => 'El campo :attribute es obligatorio.',
            'name.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'name.regex' => 'El campo :attribute solo puede contener letras y espacios y numeros.',
            'year.numeric' => 'El campo :attribute debe ser un año valido.',
            'number.unique' => 'Ya existe una materia con estos datos.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre materia',
            'number' => 'numero gestion',
            'year' => 'año',
        ];
    }
}

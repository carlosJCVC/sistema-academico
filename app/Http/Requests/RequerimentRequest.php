<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequerimentRequest extends FormRequest
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
                    // 'title' => 'required|max:100',
                    'quantity' => 'required',
                    'hours' => 'required',
                    'destine' => 'required',
                    // 'description' => 'required|max:500',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    // 'title' => 'required|max:100',
                    'quantity' => 'required',
                    'hours' => 'required',
                    'destine' => 'required',
                    // 'description' => 'required|max:500',
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
            // 'title.required' => 'El campo :attribute es obligatorio.',
            'quantity.required' => 'El campo :attribute es obligatorio.',
            'hours.required' => 'El campo :attribute es obligatorio.',
            'destine.required' => 'El campo :attribute es obligatorio.',
            // 'description.required' => 'El campo :attribute es obligatorio.',
            // 'title.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            // 'description.max' => 'El campo :attribute no debe ser mayor a 500 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            // 'title' => 'Titulo',
            'quantity' => 'Cantidad',
            'hours' => 'Horas',
            'destine' => 'Horas',
            // 'description' => 'Descripcion',
        ];
    }
}

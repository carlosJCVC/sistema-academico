<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisoRequest extends FormRequest
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
                    'title' => 'required|max:100',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|max:100',
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
            'title.required' => 'El campo :attribute es obligatorio.',
            'file.required' => 'El campo :attribute es obligatorio.',
            'title.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Titulo',
            'file' => 'Archivo',
        ];
    }
}

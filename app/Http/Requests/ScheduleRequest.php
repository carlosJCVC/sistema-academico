<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
                    'from' => 'required|max:100',
                    'to' => 'required|max:500',
                    'day' => 'required|max:500',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'from' => 'required|max:100',
                    'to' => 'required|max:500',
                    'day' => 'required|max:500',
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
            'from.required' => 'El campo :attribute es obligatorio.',
            'to.required' => 'El campo :attribute es obligatorio.',
            'from.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'to.max' => 'El campo :attribute no debe ser mayor a 500 caracteres.',
            'day.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'day.max' => 'El campo :attribute no debe ser mayor a 500 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'from' => 'De',
            'to' => 'A',
            'day' => 'Dia',
        ];
    }
}

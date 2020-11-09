<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSubCalification extends FormRequest
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
        $rules = [
            'title' => 'required',
            'percentage' => 'required',
            'description' => 'required',
        ];

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return $rules;
            }
            case 'PUT':
            case 'PATCH': {
                return $rules;
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
            'percentage.required' => 'El campo :attribute es obligatorio.',
            'description.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'title.required' => 'El campo :attribute es obligatorio.',
            'percentage.required' => 'El campo :attribute es obligatorio.',
            'description.required' => 'El campo :attribute es obligatorio.',
        ];
    }
}

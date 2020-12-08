<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorityRequest extends FormRequest
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
                        'user' => 'required|exists:users,id',
                        'role' => 'required|exists:roles,id',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'user' => 'required|exists:users,id',
                        'role' => 'required|exists:roles,id',
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
            'role.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'Nombre autoridad',
            'role' => 'Cargo autoridad',
        ];
    }
}

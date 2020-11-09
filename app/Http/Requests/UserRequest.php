<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'name' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    'gender' => 'required',
                    'ci' => 'required|digits_between:5,8|unique:users,ci',
                    'cod_sis' => 'required|digits_between:5,10|unique:users,cod_sis',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|between:3,32',
                    'password_confirm' => 'required|same:password',
                    'roles' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    'gender' => 'required',
                    'ci' => 'required|digits_between:5,8|unique:users,ci, ' . $this->user->id,
                    'cod_sis' => 'required|digits_between:5,10|unique:users,cod_sis,' . $this->user->id,
                    'email' => 'required|email|unique:users,email,' . $this->user->id,
                    'roles' => 'required',
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
            'lastname.required' => 'El campo :attribute es obligatorio.',
            'gender.required' => 'El campo :attribute es obligatorio.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'roles.required' => 'El campo :attribute es obligatorio.',
            'ci.required' => 'El campo :attribute es obligatorio.',
            'cod_sis.required' => 'El campo :attribute es obligatorio.',
            
            'ci.digits_between' => 'El :attribute debe estar entre 5 y 8 digitos.',
            'cod_sis.digits_between' => 'El :attribute debe estar entre 5 y 10 digitos.',

            'email.unique' => 'El campo :attribute ya existe.',

            'password.required' => 'El campo :attribute es obligatorio.',
            'password.between' => 'El campo :attribute debe tener 6 a 32 caracteres.',
            'password_confirm.same' => 'Este campo no coincide con el Password.',
            'password_confirm.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'gender' => 'Genero',
            'ci' => 'C.I.',
            'cod_sis' => 'Codigo sis',
            'email' => 'E-mail',
            'password' => 'Password',
            'role' => 'Role o Roles',
        ];
    }

}

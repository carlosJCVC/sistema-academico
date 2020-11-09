<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostulantRequest extends FormRequest
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
                    'ci' => 'required|digits_between:5,8|unique:users,ci',
                    'cod_sis' => 'required|digits_between:5,10|unique:users,cod_sis',
                    //'email' => 'required|email|unique:users,email',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|digits_between:5,8',
                    'gender' => 'required',
                    'address' => 'required',
                    //'auxiliar_name' => 'required',
                    'nro_docs' => 'required',
                    'nro_certificates' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    'email' => 'required|email|unique:users,email,' . $this->user->id,
                    'phone' => 'required|numeric',
                    'gender' => 'required',
                ];
            }
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
            'email.required' => 'El campo :attribute es obligatorio.',
            'phone.required' => 'El campo :attribute es obligatorio.',
            'gender.required' => 'El campo :attribute es obligatorio.',
            'password.required' => 'El campo :attribute es obligatorio.',
            'ci.required' => 'El campo :attribute es obligatorio.',
            'cod_sis.required' => 'El campo :attribute es obligatorio.',
            'address.required' => 'El campo :attribute es obligatorio.',
            'auxiliar_name.required' => 'El campo :attribute es obligatorio.',
            'nro_docs.required' => 'El campo :attribute es obligatorio.',

            'phone.numeric' => 'El campo :attribute debe contener solo numeros.',
            'email.unique' => 'El campo :attribute ya existe.',

            'password.between' => 'El campo :attribute debe tener 6 a 32 caracteres.',
            'password_confirm.same' => 'Este campo no coincide con el Password.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'ci' => 'C.I.',
            'cod_sis' => 'Cod. SIS',
            'email' => 'E-mail',
            'phone' => 'Telefono/Celular',
            'gender' => 'Genero',
            'auxiliar_name' => 'Nombre auxiliatura',
            'nro_docs' => 'Nro de documentos',
            'password' => 'Password',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
                    'files' => 'required|array|min:1',
                    'files.*' => 'file|mimes:jpg,jpeg,png,txt,doc,docx,pdf,zip,rar',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'files' => 'required|array|min:1',
                    'files.*' => 'file|mimes:jpg,jpeg,png,txt,doc,docx,pdf,zip,rar',
                ];
            }
            default:
                break;
        }

        return [
            //
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignatureGroupRequest extends FormRequest
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
        $group = $this->group;

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'group' => 'required|numeric',
                        'asignature' => [
                            'required',
                            'exists:asignatures,id',
                            Rule::unique('asignature_groups', 'asignature_id')->where(function ($query) use ($group) {
                                $query->where([
                                    ['group', '=', $group],
                                ]);
                            })
                        ],
                        'teachers' => 'required|array|min:1',
                        'teachers.0.key' => 'required|exists:users,id',
                        'teachers.0.titular' => 'required|boolean',
                        'teachers.0.schedules' => 'required|array|min:1',
                        'teachers.1.key' => 'nullable|exists:users,id',
                        'teachers.1.titular' => 'nullable|boolean',
                        'teachers.1.schedules' => 'nullable|array|min:1|required_with:teachers.1.key',
                        // 'teachers.*.from' => 'required|string',
                        // 'teachers.*.to' => 'required|string',
                        // 'teachers.*.day' => 'required|string',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'group' => 'required|numeric',
                        'asignature' => [
                            'required',
                            'exists:asignatures,id',
                            Rule::unique('asignature_groups', 'asignature_id')->ignore($this->id)->where(function ($query) use ($group) {
                                $query->where([
                                    ['group', '=', $group],
                                ]);
                            })
                        ],
                        'teachers' => 'required|array|min:1',
                        'teachers.0.key' => 'required|exists:users,id',
                        'teachers.0.titular' => 'required|boolean',
                        'teachers.0.schedules' => 'required|array|min:1',
                        'teachers.1.key' => 'nullable|exists:users,id',
                        'teachers.1.titular' => 'nullable|boolean',
                        'teachers.1.schedules' => 'nullable|array|min:1|required_with:teachers.1.key',
                        // 'teachers.*.from' => 'required|string',
                        // 'teachers.*.to' => 'required|string',
                        // 'teachers.*.day' => 'required|string',
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
            'group.required' => 'El campo :attribute es obligatorio.',
            'asignature.required' => 'El campo :attribute es obligatorio.',
            'asignature.unique' => 'Ya existe un grupo de materia con estos datos.',
            'teachers.0.key.required' => 'El campo :attribute es obligatorio.',
            'teachers.0.key.exists' => 'El campo :attribute debe ser valido y estar presente en el sistema.',
            'teachers.0.schedules.required' => 'El campo :attribute es obligatorio.',
            'teachers.0.schedules.min' => 'El campo :attribute debe tener un horario.',

            'teachers.1.key.exists' => 'El campo :attribute debe ser valido y estar presente en el sistema.',
            'teachers.1.schedules.required_with' => 'El campo :attribute es obligatorio cuando auxiliar esta presente.',
        ];
    }

    public function attributes()
    {
        return [
            'group' => 'numero de grupo',
            'asignature' => 'materia',
            'teachers.0.key' => 'docente',
            'teachers.0.schedules' => 'horarios docente',
            'teachers.1.key' => 'auxiliar',
            'teachers.1.schedules' => 'horario auxiliar'
        ];
    }
}

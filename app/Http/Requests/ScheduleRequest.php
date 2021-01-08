<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $from = $this->from;
        $to = $this->to;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'from' => 'required',
                        'to' => 'required|after:from|time_gt:from,90',
                        'day' => [
                            'required',
                            'max:50',
                            Rule::unique('schedules')->where(function ($query) use ($from, $to) {
                                $query->where([
                                    ['from', '=', $from],
                                    ['to', '=', $to],
                                ]);
                            })
                        ],
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'from' => 'required',
                        'to' => 'required|after:from|time_gt:from,90',
                        'day' => [
                            'required',
                            'max:50',
                            Rule::unique('schedules')->ignore($this->schedule->id)->where(function ($query) use ($from, $to) {
                                $query->where([
                                    ['from', '=', $from],
                                    ['to', '=', $to],
                                ]);
                            })
                        ],
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
            'day.max' => 'El campo :attribute no debe ser mayor a 50 caracteres.',
            'day.unique' => 'Ya existe un horario con estos datos.',
        ];
    }

    public function attributes()
    {
        return [
            'from' => 'Desde',
            'to' => 'Hasta',
            'day' => 'Dia',
        ];
    }
}

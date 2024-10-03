<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'firstname' => ['required', 'string', 'min:1'],
            'lastname'  => ['required', 'string', 'min:1'],
            'salary'    => ['required', 'numeric', 'min:1'],
            'image'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],

        ];
    }
}

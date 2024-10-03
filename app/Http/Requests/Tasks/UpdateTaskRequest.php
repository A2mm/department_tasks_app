<?php

namespace App\Http\Requests\Tasks;

use App\Enums\Tasks\TaskStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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

            'title'        => ['required', 'string', 'min:1'],
            'description'  => ['required', 'string', 'min:1'],
            'status'  => [
                'required',
                'string',
                Rule::in([TaskStatusEnum::PENDING, TaskStatusEnum::IN_PROGRESS, TaskStatusEnum::DONE])
            ],
            'user_id'  => [
                'nullable',
                'integer',
                Rule::exists('users', 'id')->whereNotNull('parent_id'),
            ],

        ];
    }
}

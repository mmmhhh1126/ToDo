<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;
use Illuminate\Validation\Rule;

// class EditTask extends FormRequest
class EditTask extends CreateTask
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $statusRule = Rule::in(array_keys(Task::STATUS));

        return array_merge($rules, [
            'status' => ['required', $statusRule],
        ]);
    }
    public function attributes()
    {
        $attributes = parent::attributes();
    
        return array_merge($attributes, [
            'status' => '状態',
        ]);
    }    
    public function messages()
    {
        $messages = parent::messages();
    
        $status_labels = collect(Task::STATUS)->pluck('label')->implode('、');
    
        return array_merge($messages, [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください。',
        ]);
    }
    
}

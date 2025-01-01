<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'course_code' => 'required|string|max:10|unique:courses,course_code', // Assuming 'courses' is your table name
            'description' => 'nullable|string|max:1000',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The course name is required.',
            'name.max' => 'The course name must not exceed 50 characters.',
            'course_code.required' => 'The course code is required.',
            'course_code.max' => 'The course code must not exceed 10 characters.',
            'course_code.unique' => 'The course code has already been taken.',
            'description.max' => 'The description must not exceed 1000 characters.',
        ];
    }
}

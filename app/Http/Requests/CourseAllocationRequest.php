<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseAllocationRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'course_type_id' => 'required|exists:course_types,id',
            'program_id' => 'required|exists:programs,id',
            'semester' => 'required|integer|between:1,8',
        ];
    }
    public function messages()
    {
        return [
            'course_id.required' => 'Please select a course.',
            'course_id.exists' => 'The selected course is invalid.',
            'course_type_id.required' => 'Please select a course type.',
            'course_type_id.exists' => 'The selected course type is invalid.',
            'program_id.required' => 'Please select a program.',
            'program_id.exists' => 'The selected program is invalid.',
            'semester.required' => 'The semester field is required.',
            'semester.integer' => 'The semester must be an integer.',
            'semester.between' => 'The semester must be between 1 and 8.',
        ];
    }
}

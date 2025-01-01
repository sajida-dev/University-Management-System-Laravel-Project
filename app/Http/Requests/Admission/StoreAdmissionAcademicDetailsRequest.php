<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionAcademicDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role_id === 4 || auth()->user()->role_id === 5;
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $degreeLevel = $this->input('degree_level');

        // Define rules for major subjects
        $majorSubjectRules = [
            'subject.*' => 'required|string',
            'obtainedMarks.*' => 'required|numeric',
            'totalMarks.*' => 'required|numeric'
        ];
        return [
            'degree_level' => 'required|in:1,2,3,4', // Ensure the value is one of the allowed options.
            'board_or_university' => 'required',
            'registration_no' => 'required|string',
            'roll_no' => 'required|string',
            'passing_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'exam_type' => 'required|boolean',
            'obtained_marks' => 'required|numeric|min:0',
            'total_marks' => 'required|numeric|min:1|gte:obtained_marks', // Total marks should be greater than or equal to obtained marks.
            // Apply rules conditionally based on degree level
            ...($degreeLevel == 2 ? $majorSubjectRules : [])
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'degree_level.required' => 'The degree level is required.',
            'board_or_university.required' => 'The board or university is required.',
            'registration_no.required' => 'The registration number is required.',
            'roll_no.required' => 'The roll number is required.',
            'passing_year.required' => 'The passing year is required.',
            'exam_type.required' => 'The examination type is required.',
            'obtained_marks.required' => 'The obtained marks are required.',
            'total_marks.required' => 'The total marks are required.',
            'total_marks.gte' => 'Total marks must be greater than or equal to obtained marks.',
            'subject.*.required' => 'Please fill out all major subject names.',
            'obtainedMarks.*.required' => 'Please fill out all obtained marks.',
            'totalMarks.*.required' => 'Please fill out all total marks.',
            'obtainedMarks.*.numeric' => 'Obtained marks must be a number.',
            'totalMarks.*.numeric' => 'Total marks must be a number.',
        ];
    }
}

<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionChooseProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;
        return auth()->user()->role_id === 4 || auth()->user()->role_id === 5;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_level_id' => 'required|exists:program_levels,id', // Validates that the program level is required and exists in the program_levels table
            'program_id' => 'required|exists:programs,id', // Validates that the program is required and exists in the programs table
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'program_level_id.required' => 'The program level field is required.',
            'program_level_id.exists' => 'The selected program level is invalid.',
            'program_id.required' => 'The program field is required.',
            'program_id.exists' => 'The selected program is invalid.',
        ];
    }
}

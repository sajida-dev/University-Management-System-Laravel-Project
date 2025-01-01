<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return auth()->user()->role_id === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100|min:2',
            'department_id' => 'required|numeric',
            'vacancies' => 'required|integer|min:1',
            'salaryFrom' => 'required|numeric|min:0',
            'salaryTo' => 'required|numeric|gte:salaryFrom',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'description' => 'required|string|max:100|min:2',
        ];
    }
}

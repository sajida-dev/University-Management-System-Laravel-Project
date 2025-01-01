<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionDisabilityRequest extends FormRequest
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
            'DisabilityStatus' => 'required|boolean',
            'DisabilityType' => 'required_if:DisabilityStatus,true',
            'DisabilityAccommodation' => 'nullable',
        ];
    }
}

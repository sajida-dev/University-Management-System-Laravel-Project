<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionAddressRequest extends FormRequest
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
            'temp_postal_address' => 'required',
            'temp_city' => 'required',
            'per_postal_address' => 'required',
            'per_city' => 'required',
        ];
    }
}

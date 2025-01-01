<?php

namespace App\Http\Requests\Admission;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionProfileRequest extends FormRequest
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
            'profile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'blood_group_id' => 'required',
            'marital_status' => 'required|boolean',
            'date_of_birth' =>
            [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $dob = Carbon::parse($value);
                    $age = $dob->age;
                    if ($age < 18) {
                        $fail('The ' . $attribute . ' must be at least 18 years old.');
                    }
                },
            ],
            'relgion_id' => 'required',
            'gender_id' => 'required',
            'is_disability' => 'required|boolean',
            'father_name' => 'required|string|max:255',
            'father_cnic' => 'required|numeric|digits:13',
            'is_father_alive' => 'required|boolean',
            'father_phone_number' => 'required|digits_between:10,15',
            'is_old_student' => 'required|boolean',
            'registration_no' => 'nullable|required_if:OldStudent,true|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'registration_no.required_if' => 'The OldRegistration field is required if you are an old student.',
        ];
    }
}

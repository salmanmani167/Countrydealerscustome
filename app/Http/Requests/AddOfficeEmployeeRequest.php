<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOfficeEmployeeRequest extends FormRequest
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
            "first_name" => "required",
            "last_name" => "required",
            "bank_name" => "required",
            "account_number" => "required",
            "cnic" => "required",
            "previous_experience" => "required",
            "salary" => "required",
            "designation" => "required",
            "department" => "required",
            "gender" => "required",
            "date_of_birth" => "required",
        ];
    }
}

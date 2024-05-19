<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'skill_level' => 'required|in:Beginner,Intermediate,Advanced,Professional',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'last_name.required' => 'A last name is required',
            'email.required' => 'An email is required',
            'password.required' => 'A password is required',
            // Add your messages here...
        ];
    }
}

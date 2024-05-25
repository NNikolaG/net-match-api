<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourtRequest extends FormRequest
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
            'name' => 'required|string',
            'surface' => 'required|in:Clay,Grass,Hard,Artificial Grass',
            'indoor' => 'nullable|boolean',
            'lightning' => 'nullable|boolean',
            'width' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'capacity' => 'nullable|numeric',
            'location' => 'nullable|string',
            'balls_provided' => 'required|boolean',
            'club_id' => 'required|exists:clubs,id',
        ];
    }
}

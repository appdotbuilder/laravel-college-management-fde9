<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id|unique:students,user_id',
            'id_no' => 'required|string|unique:students,id_no',
            'matric_no' => 'nullable|string|unique:students,matric_no',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'User selection is required.',
            'user_id.exists' => 'Selected user does not exist.',
            'user_id.unique' => 'This user already has a student record.',
            'id_no.required' => 'Student ID number is required.',
            'id_no.unique' => 'This student ID number is already taken.',
            'matric_no.unique' => 'This matriculation number is already taken.',
            'phone.required' => 'Phone number is required.',
        ];
    }
}
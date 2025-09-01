<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'address' => 'required|min:10|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'gpa' => 'required|min:2.0|max:4.0'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 3 characters',
            'name.max' => 'Name must not exceed 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'address.required' => 'Address is required',
            'address.min' => 'Address must be at least 10 characters',
            'address.max' => 'Address must not exceed 100 characters',
            'semester.required' => 'Semester is required',
            'semester.integer' => 'Semester must be an integer',
            'semester.min' => 'Semester must be at least 1',
            'semester.max' => 'Semester must not exceed 8',
            'gpa.required' => 'GPA is required',
            'gpa.min' => 'GPA must be at least 2.0',
            'gpa.max' => 'GPA must not exceed 4.0'
        ];
    }
}

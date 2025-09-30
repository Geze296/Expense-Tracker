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
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|string|confirmed|min:8|max:16"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.unique" => "Email is already taken",
            "password.required" => "Password is required",
            "password.confirmed" => "Password does not match",
            "password.min" => "Password must be at least 8 characters",
            "password.max" => "Password must not be greater than 16 characters"
        ];
    }
}

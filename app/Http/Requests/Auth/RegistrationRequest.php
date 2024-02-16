<?php

namespace App\Http\Requests\Auth;

use App\Validators\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|string|max:30|min:3',
            'surname' => 'required|string|max:30|min:1',
            'lastname' => 'required|string|max:30|min:1',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:30'
        ];
    }

    /**
     * @param $validator
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation($validator)
    {
        RequestValidator::handleValidationErrors($validator);
    }
}

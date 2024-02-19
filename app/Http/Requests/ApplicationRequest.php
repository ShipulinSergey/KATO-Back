<?php

namespace App\Http\Requests;

use App\Validators\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'surname' => 'required|string',
            'lastname' => 'string',
            'position'=> 'string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'job' => 'string',
            'form' => 'nullable',
            'in_kata' => 'nullable|integer|in:0,1',
            'notify' => 'nullable|integer|in:0,1',
            'сonsent_status' => 'nullable|integer|in:0,1',
        ];
    }
    protected function failedValidation($validator)
    {
        RequestValidator::handleValidationErrors($validator);
    }
}

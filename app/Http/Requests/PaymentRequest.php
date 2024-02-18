<?php

namespace App\Http\Requests;

use App\Validators\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'card_number' => 'required|string|max:16',
            'date_end' => 'required|string',
            'cvv' => 'required|string|max:3'
        ];
    }

    protected function failedValidation($validator)
    {
        RequestValidator::handleValidationErrors($validator);
    }
}

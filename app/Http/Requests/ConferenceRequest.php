<?php

namespace App\Http\Requests;

use App\Validators\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
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
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'location' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'greetings' => 'required|string',
            'organ_contact_id' => 'required|integer',
            'editor_contact_id' => 'required|integer',
        ];
    }

    protected function failedValidation($validator)
    {
        RequestValidator::handleValidationErrors($validator);
    }
}

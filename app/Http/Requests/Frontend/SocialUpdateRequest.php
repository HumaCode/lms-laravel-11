<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SocialUpdateRequest extends FormRequest
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
            'facebook'      => ['nullable', 'max:255', 'string'],
            'x'             => ['nullable', 'max:255', 'string'],
            'linkedin'      => ['nullable', 'max:255', 'string'],
            'website'       => ['nullable', 'max:255', 'string'],
            'github'        => ['nullable', 'max:255', 'string'],
        ];
    }
}

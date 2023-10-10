<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class advertiserPatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:100',
            'password' => 'string|min:8|max:100|password',
            'geolocation' => 'double|max:50',
            'establishment' => 'string|max:50',
            'cuisine' => 'integer|max:10'
        ];
    }
}

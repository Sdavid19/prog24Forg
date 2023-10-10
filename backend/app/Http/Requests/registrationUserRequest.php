<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationUserRequest extends FormRequest

{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|max:100|email',
            'password' => 'required|min:8|max:100',
            'geolocation' => 'required|max:50',
            'diet' => 'required',
            'cuisine' => 'required',
            'diabetes' => 'required',
            'foodIntolerance' => 'required|max:50',
            'foodAllergy' => 'required'

        ];
    }
}

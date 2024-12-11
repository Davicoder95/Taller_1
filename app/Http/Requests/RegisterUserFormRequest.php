<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserFormRequest extends FormRequest
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
        'name' => 'required','string','max:255',
        'lastname' => 'required','string','max:255',
        'email' => 'required','string','email','max:255','unique:users',
        'password' => 'required','string','min:8','confirmed',
        'gender' => 'required','string','in:male,female',
        'address' => 'required','string','max:255',
        'phone' => 'required','string','max:20',
        'country_id' => 'required|exists:countries,id'
        ];
    }
}

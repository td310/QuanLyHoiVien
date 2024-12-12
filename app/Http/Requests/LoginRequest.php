<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.regex' => 'Địa chỉ email phải là @gmail.com.',
            'email.email' => 'Email phải đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
        ];
    }
}

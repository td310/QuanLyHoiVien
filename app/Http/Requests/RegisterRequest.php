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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'phone' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Full Name không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'password_confirmation.required' => 'Mật khẩu nhập lại không được để trống.',
            'password_confirmation.min' => 'Mật khẩu nhập lại phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu và mật khẩu nhập lại không khớp.',
        ];
    }
}

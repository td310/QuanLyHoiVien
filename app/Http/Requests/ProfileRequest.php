<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'max:30',
            'phone' => 'max:10',
            'password' => 'min:6',
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.max' => 'Tên người dùng không quá 30 kí tự.',
            'phone.max' => 'Số điện thoại không quá 10 kí tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
    
}

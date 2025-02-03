<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'personal_customer_name' => 'required|string|max:255',
            'id_login' => 'required|string|max:255',
            'id_card' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'unit' => 'required|string|max:255',
            'term' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'major_id' => 'required|exists:majors,id',
            'feild_id' => 'required|exists:fields,id',
        ];
    }
    
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'email' => 'Email không đúng định dạng',
            'max' => ':attribute không được quá :max ký tự',
            'exists' => ':attribute không tồn tại trong hệ thống',
            'in' => ':attribute không hợp lệ'
        ];
    }
    
}

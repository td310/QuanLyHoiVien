<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemLevelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'membership_level_name' => 'required|string|max:255|unique:membership_levels,membership_level_name',
            'fee' => 'required|numeric',
            'contribute' => 'nullable|numeric',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'membership_level_name.required' => 'Tên hạng thành viên không được để trống',
            'membership_level_name.unique' => 'Tên hạng thành viên đã tồn tại',
            'fee.required' => 'Nhập mức phí phải nộp.',
            'fee.max' => 'Giá mức phí không quá 10 ký tự.'
        ];
    }
    
}

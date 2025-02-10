<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'activity_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'customer_type' => 'required|in:all,corporate,personal,partner,committee',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx,xls,xlsx|max:2048',
            'manual_name.*' => 'nullable|string|max:255',
            'manual_email.*' => 'nullable|email'
        ];
    }
    
    public function messages(): array
    {
        return [
            'activity_name.required' => 'Vui lòng nhập tên hoạt động',
            'location.required' => 'Vui lòng nhập địa điểm',
            'description.required' => 'Vui lòng nhập mô tả',
            'date_start.required' => 'Vui lòng chọn ngày bắt đầu',
            'date_end.required' => 'Vui lòng chọn ngày kết thúc',
            'date_end.after' => 'Ngày kết thúc phải sau ngày bắt đầu',
            'customer_type.required' => 'Vui lòng chọn loại khách hàng',
            'file.required' => 'Vui lòng chọn file',
            'manual_email.*.email' => 'Email không hợp lệ'
        ];
    }
    
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'method' => 'required|in:email,notification',
            'date' => 'required|in:now,custom',
            'selected' => 'required_without:manual_email|array|min:1',
            'manual_email' => 'nullable|email|required_without:selected',
            'description' => 'nullable|string'
        ];
    
        if ($this->input('date') === 'custom') {
            $rules['date_custom'] = 'required|date|after:now';
        }
    
        return $rules;
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'method.required' => 'Vui lòng chọn phương thức gửi',
            'date.required' => 'Vui lòng chọn thời gian gửi',
            'date_custom.after' => 'Thời gian gửi phải lớn hơn thời gian hiện tại',
            'selected.required_without' => 'Vui lòng chọn ít nhất một người nhận hoặc nhập email',
            'manual_email.email' => 'Email không đúng định dạng'
        ];
    }
    
}

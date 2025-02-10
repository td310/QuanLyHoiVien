<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'host' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'selected' => 'required|array|min:1',
            'manual_email' => 'nullable|email'
        ];
    
        if ($this->isMethod('PUT')) {
            $rules['date'] = 'required|date';
        } else {
            $rules['date'] = 'required|date|after:now';
        }
    
        return $rules;
    }
    
    public function messages(): array
    {
        return [
            'host.required' => 'Vui lòng nhập người chủ trì',
            'title.required' => 'Vui lòng nhập tiêu đề cuộc họp',
            'location.required' => 'Vui lòng nhập địa điểm',
            'date.required' => 'Vui lòng chọn thời gian',
            'date.after' => 'Thời gian phải lớn hơn hiện tại',
            'selected.required' => 'Vui lòng chọn ít nhất một người tham gia'
        ];
    }
    
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'committee_id' => 'required|exists:committees,id',
            'date' => 'required|date',
            'description' => 'required|string|max:500',
            'debt' => 'required|string|max:255',
            'attachment' => 'nullable',
        ];

        return $rules;
    }
    
    public function messages(): array
    {
        return [
            'committee_id.required' => 'Vui lòng chọn khách hàng',
            'date.required' => 'Nhập ngày hội phí.',
            'description.required' => 'Nhập nội dung.',
            'description.max' => 'Nội dung không quá 500 ký tự.',
            'debt.required' => 'Số tiền nợ không được để trống.',
        ];
    }
    
}

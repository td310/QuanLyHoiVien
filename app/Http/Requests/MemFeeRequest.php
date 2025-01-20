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
            'customer_type' => 'required|in:committee,corporate',
            'date' => 'required|date',
            'description' => 'required|string|max:500',
            'debt' => 'required|string|max:255',
            'attachment' => 'nullable'
        ];

        if ($this->input('customer_type') === 'committee') {
            $rules['committee_id'] = 'required|exists:committees,id';
            $rules['cuscorporate_id'] = 'nullable';
        }

        if ($this->input('customer_type') === 'corporate') {
            $rules['cuscorporate_id'] = 'required|exists:cus_corporates,id';
            $rules['committee_id'] = 'nullable';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'customer_type.required' => 'Vui lòng chọn loại khách hàng',
            'customer_type.in' => 'Loại khách hàng không hợp lệ',
            'committee_id.required' => 'Vui lòng chọn hội viên',
            'cuscorporate_id.required' => 'Vui lòng chọn doanh nghiệp',
            'date.required' => 'Nhập ngày hội phí',
            'description.required' => 'Nhập nội dung',
            'debt.required' => 'Số tiền nợ không được để trống'
        ];
    }
    
}

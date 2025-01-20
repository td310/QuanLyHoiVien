<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorshipRequest extends FormRequest
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
            'product' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'total' => 'required|numeric',
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
            'date.required' => 'Nhập ngày hội phí.',
            'description.required' => 'Nhập nội dung.',
            'description.max' => 'Nội dung không quá 500 ký tự.',
            'product.required' => 'Nhập tên sản phẩm.',
            'product.max' => 'Tên sản phẩm không quá 255 ký tự.',
            'unit.required' => 'Nhập đơn vị tính.',
            'unit.max' => 'Đơn vị tính không quá 255 ký tự.',
            'price.required' => 'Nhập giá sản phẩm.',
            'price.max' => 'Giá sản phẩm không quá 255 ký tự.',
            'quantity.required' => 'Nhập số lượng sản phẩm.',
            'quantity.max' => 'Số lượng sản phẩm không quá 255 ký tự.',
            'total.required' => 'Nhập tổng tiền.',
            'total.max' => 'Tổng tiền không quá 255 ký tự.',
        ];
    }
}

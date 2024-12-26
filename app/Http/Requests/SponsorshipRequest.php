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
        return[
            'committee_id' => 'required|exists:committees,id',
            'date' => 'required|date',
            'description' => 'required|string|max:500',
            'product' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'total' => 'required|numeric',
            'attachment' => 'nullable'
        ];
    }
    
    public function messages(): array
    {
        return [
            'committee_id.required' => 'Vui lòng chọn khách hàng',
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

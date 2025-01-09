<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'business_name' => 'required|string|max:255|unique:businesses,business_name',
            'business_id' => 'required|string|max:50|unique:businesses,business_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'business_name.required' => 'Tên doanh nghiệp không được để trống',
            'business_name.unique' => 'Tên doanh nghiệp đã tồn tại',
            'business_id.required' => 'Mã doanh nghiệp không được để trống',
            'business_id.unique' => 'Mã doanh nghiệp đã tồn tại'
        ];
    }
    
}

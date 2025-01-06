<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetCusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'target_customer_name' => 'required|string|max:255|unique:target_customers,target_customer_name',
            'target_customer_id' => 'required|string|max:50|unique:target_customers,target_customer_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'target_customer_name.required' => 'Tên MTKH không được để trống',
            'target_customer_name.unique' => 'Tên MTKH đã tồn tại',
            'target_customer_id.required' => 'Mã MTKH không được để trống',
            'target_customer_id.unique' => 'Mã MTKH đã tồn tại'
        ];
    }
    
}

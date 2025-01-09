<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'organization_name' => 'required|string|max:255|unique:organizations,organization_name',
            'organization_id' => 'required|string|max:50|unique:organizations,organization_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'organization_name.required' => 'Tên tổ chức không được để trống',
            'organization_name.unique' => 'Tên tổ chức đã tồn tại',
            'organization_id.required' => 'Mã tổ chức không được để trống',
            'organization_id.unique' => 'Mã tổ chức đã tồn tại'
        ];
    }
    
}

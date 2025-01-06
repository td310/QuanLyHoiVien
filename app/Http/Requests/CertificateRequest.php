<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'certificate_name' => 'required|string|max:255|unique:certificates,certificate_name',
            'certificate_id' => 'required|string|max:50|unique:certificates,certificate_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'certificate_name.required' => 'Tên chứng chỉ không được để trống',
            'certificate_name.unique' => 'Tên chứng chỉ đã tồn tại',
            'certificate_id.required' => 'Mã chứng chỉ không được để trống',
            'certificate_id.unique' => 'Mã chứng chỉ đã tồn tại'
        ];
    }
    
}

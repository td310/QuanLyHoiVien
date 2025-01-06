<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'field_name' => 'required|string|max:255',
            'field_id' => 'required|string|max:50',
            'description' => 'nullable|string',
            'major_id' => 'required|exists:majors,id',
            'subgroups' => 'nullable|array',
            'subgroups.*.name' => 'required|string|max:255',
            'subgroups.*.description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'field_name.required' => 'Tên lĩnh vực không được để trống',
            'field_name.unique' => 'Tên lĩnh vực đã tồn tại',
            'field_id.required' => 'Mã lĩnh vực không được để trống',
            'field_id.unique' => 'Mã lĩnh vực đã tồn tại',
            'major_id.required' => 'Vui lòng chọn ngành',
            'major_id.exists' => 'Ngành không tồn tại'
        ];
    }
    
}

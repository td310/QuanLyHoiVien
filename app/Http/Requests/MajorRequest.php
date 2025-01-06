<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'major_name' => 'required|string|max:255|unique:majors,major_name',
            'major_id' => 'required|string|max:50|unique:majors,major_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'major_name.required' => 'Tên ngành không được để trống',
            'major_name.unique' => 'Tên ngành đã tồn tại',
            'major_id.required' => 'Mã ngành không được để trống',
            'major_id.unique' => 'Mã ngành đã tồn tại'
        ];
    }
    
}

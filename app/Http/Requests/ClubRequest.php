<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'club_code' => 'required|string|max:50|unique:clubs',
            'club_name_vn' => 'required|string|max:255',
            'club_name_en' => 'nullable|string|max:255',
            'club_name_acronym' => 'nullable|string|max:50',
            'address' => 'required|string',
            'tax_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable',
            'fanpage' => 'nullable',
            'date' => 'required|date',
            'decision' => 'required|string',
            'status' => 'nullable',
            'major_id' => 'required|exists:majors,id',
            'feild_id' => 'required|exists:fields,id',
            'market_id' => 'required|exists:markets,id',
            'managers' => 'required|array|min:1',
            'managers.*.connection_manager_name' => 'required|string',
            'managers.*.position' => 'required|string',
            'managers.*.phone' => 'required|string',
            'managers.*.gender' => 'required|in:male,female',
            'managers.*.email_connection' => 'required|email'
        ];
    }
    
    public function messages(): array
    {
        return [
            'club_code.required' => 'Mã câu lạc bộ không được để trống',
            'club_name_vn.required' => 'Tên câu lạc bộ không được để trống',
            'major_id.required' => 'Vui lòng chọn ngành',
            'feild_id.required' => 'Vui lòng chọn lĩnh vực'
        ];
    }
    
}

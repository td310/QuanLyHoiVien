<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CusCorporateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'id_login' => 'required|string|max:255',
            'id_card' => 'required|string|max:255',
            'company_vn' => 'required|string|max:255',
            'company_en' => 'nullable|string|max:255',
            'company_acronym' => 'nullable|string|max:50',
            'main_address' => 'required|string',
            'office_address' => 'required|string',
            'tax_number' => 'required|string|max:20',
            'website' => 'nullable|url',
            'fanpage' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'date_of_establishment' => 'required|date',
            'charter_capital' => 'required|string',
            'revenue' => 'required|string',
            'email' => 'required|email',
            'size_company' => 'required|in:50-100,101-200,201-500,>500',
            'prize' => 'required|string',
            'award_certificate' => 'required|string',
            'certificate_id' => 'required|exists:certificates,id',
            'major_id' => 'required|exists:majors,id',
            'feild_id' => 'required|exists:fields,id',
            'market_id' => 'required|exists:markets,id',
            'target_customer_id' => 'required|exists:target_customers,id',
            'club_id' => 'required|exists:clubs,id',
            //lãnh đạo
            'leader.connection_manager_name' => 'required|string|max:255',
            'leader.position' => 'required|string|max:255',
            'leader.phone' => 'required|string|max:20',
            'leader.gender' => 'required|in:male,female',
            'leader.email_connection' => 'required|email',
            'leader.is_leader' => 'required|in:1',
            //phụ trách
            'managers' => 'required|array|min:1',
            'managers.*.connection_manager_name' => 'required|string|max:255',
            'managers.*.position' => 'required|string|max:255',
            'managers.*.phone' => 'required|string|max:20',
            'managers.*.gender' => 'required|in:male,female',
            'managers.*.email_connection' => 'required|email',
        ];

        if ($this->isMethod('post') || $this->has('leader')) {
            $rules = array_merge($rules, [
                'leader.connection_manager_name' => 'required|string|max:255',
                'leader.position' => 'required|string|max:255',
                'leader.phone' => 'required|string|max:20',
                'leader.gender' => 'required|in:male,female',
                'leader.email_connection' => 'required|email',
                'leader.is_leader' => 'required|in:1',
            ]);
        }

        if ($this->isMethod('post') || $this->has('managers')) {
            $rules = array_merge($rules, [
                'managers' => 'required|array|min:1',
                'managers.*.connection_manager_name' => 'required|string|max:255',
                'managers.*.position' => 'required|string|max:255',
                'managers.*.phone' => 'required|string|max:20',
                'managers.*.gender' => 'required|in:male,female',
                'managers.*.email_connection' => 'required|email',
            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng email',
            'url' => ':attribute không đúng định dạng URL',
            'exists' => ':attribute không tồn tại trong hệ thống'
        ];
    }
}

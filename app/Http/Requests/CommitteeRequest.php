<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $committeeId = $this->route('id');
        
        $rules = [
            'id_login' => 'required|string|unique:committees,id_login,' . $committeeId,
            'committee_name' => 'required|string|max:255',
            'id_card' => 'required|string|unique:committees,id_card,' . $committeeId,
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:committees,email,' . $committeeId,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'unit' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'term' => 'required|string|max:255',
            'attendance' => 'required|in:present,absent',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        if ($committeeId) {
            $rules['status'] = 'required|in:active,inactive';
        }

        return $rules;
    }
    
    public function messages(): array
    {
        return [
            'committee_name.required' => 'Vui lòng nhập họ và tên',
            'id_card.required' => 'Vui lòng nhập mã thẻ',
            'id_card.unique' => 'Mã thẻ đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'date_of_birth.required' => 'Vui lòng nhập ngày sinh',
            'gender.required' => 'Vui lòng chọn giới tính',
            'gender.in' => 'Giới tính không hợp lệ',
            'unit.required' => 'Vui lòng nhập thông tin đơn vị',
            'position.required' => 'Vui lòng nhập chức vụ',
            'title.required' => 'Vui lòng nhập chức danh',
            'term.required' => 'Vui lòng nhập nhiệm kỳ',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg',
            'image.max' => 'Kích thước hình ảnh tối đa là 2MB',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ'
        ];
    }
    
}

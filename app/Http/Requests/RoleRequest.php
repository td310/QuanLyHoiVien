<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'role_name' => 'required|string|max:255',
            'role_code' => 'required|string|max:50|unique:roles',
            'permissions' => 'required|array',
            'permissions.*' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'role_name.required' => 'Vui lòng nhập tên vai trò',
            'role_code.required' => 'Vui lòng nhập mã vai trò',
            'role_code.unique' => 'Mã vai trò đã tồn tại',
            'permissions.required' => 'Vui lòng chọn ít nhất một quyền'
        ];
    }
}
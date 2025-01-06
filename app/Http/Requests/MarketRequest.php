<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'market_name' => 'required|string|max:255|unique:markets,market_name',
            'market_id' => 'required|string|max:50|unique:markets,market_id',
            'description' => 'nullable|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'market_name.required' => 'Tên thị trường không được để trống',
            'market_name.unique' => 'Tên thị trường đã tồn tại',
            'market_id.required' => 'Mã thị trường không được để trống',
            'market_id.unique' => 'Mã thị trường đã tồn tại'
        ];
    }
    
}

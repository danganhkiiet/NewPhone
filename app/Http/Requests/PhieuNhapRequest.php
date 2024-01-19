<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuNhapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'thong_tin_nguoi_giao' => 'required|regex:/^[^0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'thong_tin_nguoi_giao.required' => 'Thông tin người giao không được bỏ trống.',
            'thong_tin_nguoi_giao.regex' => 'Thông tin người giao không được chứa số.',
        ];
    }
}

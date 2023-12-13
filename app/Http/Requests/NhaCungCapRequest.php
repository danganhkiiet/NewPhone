<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
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
            'ten' => 'required',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'numeric|required',
            'email' => 'email|required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'Họ tên không được bỏ trống.',
            'dia_chi.required'=>'Địa chỉ không được bỏ trống.',
            'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống.',
            'so_dien_thoai.numeric' => 'Số điện thoại phải là số.',
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email không hợp lệ.',
        ];
    }
}

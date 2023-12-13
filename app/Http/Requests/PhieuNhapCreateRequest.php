<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuNhapCreateRequest extends FormRequest
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
            'thong_tin_nguoi_giao'=>'required',
            'nha_cung_cap_id'=>'required',
            'ngay_nhap_hang'=>'required',
            'admin_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'thong_tin_nguoi_giao.required' => 'Thông tin người giao không được bỏ trống.',
            'nha_cung_cap_id.required'=>'Nhà cung cấp không được bỏ trống.',
            'ngay_nhap_hang.required' => 'Ngày nhập không được bỏ trống.',
            'admin_id.required' => 'admin không được bỏ trống.',
        ];
    }
}

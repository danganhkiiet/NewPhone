<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APIKhachHangController extends Controller
{
    public function dangKy(Request $request){

        $khach_hang=KhachHang::create(['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'so_dien_thoai'=>$request->so_dien_thoai,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        return response()->json(
            [
                'success'=>true,
                'status'=>200,
                'messages'=>'Đây ký thành công',
            ]
        );
    }


    //Đăng Nhập Khách Hàng

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function login()
    {

        $validator = Validator::make(request(['email', 'password']), [
            'email' => 'required|email', // Kiểm tra email có đúng định dạng hay không
            'password' => 'required|min:3',
        ],[
            'email.required'=>'Email không thể để trống',
            'email.email'=>'Email không hợp lệ',
            'password.required'=>'Password không thể để trống',

        ]);
    
        if ($validator->fails()) {
            return response()->json(['lỗi' => $validator->errors()->first()], 422);
        }
    
        $khach_hang = $validator->validated();
        // dd($validator);

        if (! $token = auth('api')->attempt($khach_hang)) {
            return response()->json(['lỗi' => 'Email hoặc Mật khẩu sai'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['thong_bao' => 'Đăng xuất thành công']);
    }
    
}

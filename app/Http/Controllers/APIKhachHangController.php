<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class APIKhachHangController extends Controller
{
    public function dangKy(Request $request){


        $token = Str::random(8);

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3',
            'dia_chi' => 'required', 
            'so_dien_thoai' => 'required', 
            'ten' => 'required', 
        ], [
            'email.required' => 'Email không thể để trống',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Password không thể để trống',
            'dia_chi.required' => 'Địa chỉ không thể để trống',
            'so_dien_thoai.required' => 'Số điện thoại không thể để trống',
            'ten.required' => 'Họ tên không thể để trống',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Trả về toàn bộ lỗi
        }

        $khach_hang_moi = $validator->validated();
        $khach_hang_moi['password'] = Hash::make(request('password'));
        $khach_hang_moi['token'] = $token;

        // $khach_hang = new KhachHang();
        // $khach_hang->ten = $request->ten;
        // $khach_hang->so_dien_thoai = $request->so_dien_thoai;
        // $khach_hang->dia_chi = $request->dia_chi;
        // $khach_hang->email = $request->email;
        // $khach_hang->password = $request->password;
        // $khach_hang->token = $token;
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Đã đăng ký thành công',
        ]);
    }

    //Đăng Nhập Khách Hàng

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
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
    public function me()
    {
        return response()->json(auth('api')->user());
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['thong_bao' => 'Đăng xuất thành công']);
    }
      
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class APIKhachHangController extends Controller
{

    public function dangKy(Request $request)
    {


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

        $khach_hang_find = KhachHang::where('email', $request->email)->first();
        if ($khach_hang_find) {
            return response()->json(['errors_email' => "Email đã tồn tại"], 422); // Trả về toàn bộ lỗi
        }

        $khach_hang_moi = $validator->validated();
        $khach_hang_moi['password'] = Hash::make(request('password'));


        $khach_hang = KhachHang::create($khach_hang_moi);

        //tạo token xác thực đăng ký
        $khach_hang->token = Str::random(8);
        $khach_hang->save();



        $mail = $khach_hang->email;
        Mail::send('tai-khoan/khach-hang/mail', ['token' => $khach_hang->token], function ($email) use ($mail) {
            $email->to($mail) // Địa chỉ email nhận được từ khách
                ->subject('MÃ XÁC NHẬN ĐĂNG KÝ TÀI KHOẢN');
        });
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $khach_hang,
            'message' => 'Đã đăng ký thành công',
        ]);
    }
    public function xacThucDangKy(Request $request)
    {

        $token = $request->input('token');
        $khach_hang = KhachHang::where('token', $token)->first();

        if (!empty($khach_hang)) {
            $khach_hang->trang_thai = 1;
            $khach_hang->token = null;
            $khach_hang->save();
            return response()->json(['message' => 'Xác minh thành công'], 200);
        }

        return response()->json(['message' => 'Mã xác minh không hợp lệ'], 400);
    }

    public function quenMatKhau()
    {
        $token = Str::random(6); // Tạo mã token ngẫu nhiên

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
        ], [
            'email.required' => 'Email không thể để trống',
            'email.email' => 'Email không hợp lệ',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Trả về toàn bộ lỗi
        }

        $khach_hang_quen_mat_khau = $validator->validated();
        $khach_hang_quen_mat_khau = KhachHang::where('email', request('email'))->first();

        $khach_hang_quen_mat_khau->token = $token;
        $khach_hang_quen_mat_khau->save();
        if (!empty($khach_hang_quen_mat_khau)) {

            $mail = $khach_hang_quen_mat_khau->email;
            Mail::send('tai-khoan/khach-hang/mail-quen-mat-khau', compact('token'), function ($email) use ($mail) {
                $email->to($mail) // Địa chỉ email nhận được từ khách
                    ->subject('MÃ XÁC NHẬN ĐĂNG KÝ TÀI KHOẢN');
            });
        }
    }

    //Đăng Nhập Khách Hàng

    public function __construct()
    {


        $this->middleware('auth:api', ['except' => ['login', 'dangKy', 'xacThucDangKy', 'quenMatKhau', 'xacThucQuenMatKhau']]);
    }

    public function login()
    {

        $validator = Validator::make(request(['email', 'password']), [
            'email' => 'required|email', // Kiểm tra email có đúng định dạng hay không
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email không thể để trống',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Password không thể để trống',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $khach_hang = $validator->validated();
        // dd($validator);

        if (!$token = auth('api')->attempt($khach_hang)) {
            return response()->json(['errors' => 'Sai Tài Khoản Hoặc Mật Khẩu'], 401);
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
    public function capNhat()
    {
        $khach_hang = KhachHang::where('id', request('khach_hang_id'))->update(['ten' => request('ten'), 'email' => request('email'), 'dia_chi' => request('dia_chi'), 'so_dien_thoai' => request('so_dien_thoai')]);
        if($khach_hang){
            $ket_qua_cap_nhat=KhachHang::find(request('khach_hang_id'));
            return response()->json([
                'success' => 200,
                'data' => $ket_qua_cap_nhat,
                'messages' => "Cập nhật thành công"
            ]);
        }
     
        
    }
}

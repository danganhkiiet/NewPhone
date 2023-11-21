<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminController extends Controller
{
    public function dangNhap(){
       return view('login');
    }
    public function xuLyDangNhap(Request $request){
        $admin=Admin::where('email',$request->email)->first();

        if(Hash::check($request->password, $admin->password)){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('dien-thoai.danh-sach');
            }
        }
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng nhập thất bại');
    }
    public function dangXuat(){
        $admin=Auth::logout();
        
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng xuất thành công');
    }
    public function danhSach(){
        $lst_admin=Admin::paginate(5);

        // if($ten = request()->ten)
        // {
        //     $lst_nhacungcap=NhaCungCap::where('ten','like','%'.$ten)->paginate(5);
        // }
        return view('tai-khoan.danh-sach',compact('lst_admin'));
    }
    public function themMoi(){
        return view('tai-khoan.them-moi');
    }
}

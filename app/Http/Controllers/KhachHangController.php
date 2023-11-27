<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use Illuminate\Support\Facades\Hash;
class khachhangController extends Controller
{
    //
    public function danhSach(){
        $lst_khach_hang = khachhang::paginate(5);
        if($ten = request()->ten)
        {
            $lst_khach_hang = khachhang::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('tai-khoan.khach-hang.danh-sach', compact('lst_khach_hang'));
    }
    public function themMoi(Request $request){
        $khach_hang= new khachhang();
        $khach_hang->ten = $request->ten;
        $khach_hang->dia_chi = $request->dia_chi;
        $khach_hang->email=$request->email;
        $khach_hang->password=Hash::make($request->password);
        $khach_hang->so_dien_thoai=$request->so_dien_thoai;
        $khach_hang->save();
        return response()->json(['message'=>'Thêm Thành Công']);
    }
    public function xuLyThemMoi(Request $request){
       $khach_hang = new khachhang();
       $khach_hang->ten = $request->ten;
       $khach_hang->email = $request->email;
       $khach_hang->dia_chi = $request->dia_chi;
       $khach_hang->so_dien_thoai = $request->so_dien_thoai;
       $khach_hang->password = Hash::make($request->password);
       $khach_hang->save();
       return redirect()->route('khach-hang.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $khach_hang = khachhang::find($id);
        return view('tai-khoan.khach-hang.cap-nhat', compact('khach_hang'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $khach_hang = khachhang::find($id);
        $khach_hang->ten = $request->ten;
        $khach_hang->email = $request->email;
        $khach_hang->dia_chi = $request->dia_chi;
        $khach_hang->so_dien_thoai = $request->so_dien_thoai;
        $khach_hang->password = 1;
        $khach_hang->save();
        return redirect()->route('khach-hang.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $khach_hang = khachhang::find($id);
        $khach_hang->delete();
        return redirect()->route('khach-hang.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TinhNangManHinh;
use Illuminate\Http\Request;

class TinhNangManHinhController extends Controller
{
    public function danhSach(){
        $lst_tnmh = TinhNangManHinh::paginate(5);
        if($ten = request()->ten)
        {
            $lst_tnmh = TinhNangManHinh::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/tinh-nang-man-hinh/danh-sach', compact('lst_tnmh'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/tinh-nang-man-hinh/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $tnmh = new TinhNangManHinh();
       $tnmh->ten = $request->ten;
       $tnmh->save();
       return redirect()->route('tinh-nang-man-hinh.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $tnmh = TinhNangManHinh::find($id);
        return view('thong-so-dien-thoai/tinh-nang-man-hinh/cap-nhat', compact('tnmh'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $tnmh = TinhNangManHinh::find($id);
        $tnmh->ten = $request->ten;
        $tnmh->save();
        return redirect()->route('tinh-nang-man-hinh.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $tnmh = TinhNangManHinh::find($id);
        $tnmh->delete();
        return redirect()->route('tinh-nang-man-hinh.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

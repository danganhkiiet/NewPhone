<?php

namespace App\Http\Controllers;

use App\Models\KichThuocManHinh;
use Illuminate\Http\Request;

class KichThuocManHinhController extends Controller
{
    public function danhSach(){
        $lst_ktmh = KichThuocManHinh::paginate(5);
        if($ten = request()->ten)
        {
            $lst_ktmh = KichThuocManHinh::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/kich-thuoc-man-hinh/danh-sach', compact('lst_ktmh'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/kich-thuoc-man-hinh/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $ktmh = new KichThuocManHinh();
       $ktmh->ten = $request->ten;
       $ktmh->save();
       return redirect()->route('kich-thuoc-man-hinh.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $ktmh = KichThuocManHinh::find($id);
        return view('thong-so-dien-thoai/kich-thuoc-man-hinh/cap-nhat', compact('ktmh'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $ktmh = KichThuocManHinh::find($id);
        $ktmh->ten = $request->ten;
        $ktmh->save();
        return redirect()->route('kich-thuoc-man-hinh.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $ktmh = KichThuocManHinh::find($id);
        $ktmh->delete();
        return redirect()->route('kich-thuoc-man-hinh.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

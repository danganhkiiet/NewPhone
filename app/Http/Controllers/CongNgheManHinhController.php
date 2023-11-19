<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongNgheManHinh;
class CongNgheManHinhController extends Controller
{
    //
    public function danhSach(){
        $lst_cong_nghe_man_hinh = CongNgheManHinh::paginate(5);
        if($ten = request()->ten)
        {
            $lst_cong_nghe_man_hinh = CongNgheManHinh::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/cong-nghe-man-hinh/danh-sach', compact('lst_cong_nghe_man_hinh'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/cong-nghe-man-hinh/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $cong_nghe_man_hinh = new CongNgheManHinh();
       $cong_nghe_man_hinh->ten = $request->ten;
       $cong_nghe_man_hinh->save();
       return redirect()->route('cong-nghe-man-hinh.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $cong_nghe_man_hinh = CongNgheManHinh::find($id);
        return view('thong-so-dien-thoai/cong-nghe-man-hinh/cap-nhat', compact('bo_nho_trong'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $cong_nghe_man_hinh = CongNgheManHinh::find($id);
        $cong_nghe_man_hinh->ten = $request->ten;
        $cong_nghe_man_hinh->save();
        return redirect()->route('cong-nghe-man-hinh.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $cong_nghe_man_hinh = CongNgheManHinh::find($id);
        $cong_nghe_man_hinh->delete();
        return redirect()->route('cong-nghe-man-hinh.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

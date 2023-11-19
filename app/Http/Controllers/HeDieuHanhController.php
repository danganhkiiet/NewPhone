<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeDieuHanh;
class HeDieuHanhController extends Controller
{
    public function danhSach(){
        $lst_hedieuhanh=HeDieuHanh::paginate(5);

        if($ten = request()->ten)
        {
            $lst_hedieuhanh=HeDieuHanh::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai.he-dieu-hanh.danh-sach',compact('lst_hedieuhanh'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai.he-dieu-hanh.them-moi');
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
        ]);
        $he_dieu_hanh=HeDieuHanh::create(['ten'=>$request->ten]);

        return redirect()->route('he-dieu-hanh.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $he_dieu_hanh=HeDieuHanh::find($id);
        return view('thong-so-dien-thoai.he-dieu-hanh.cap-nhat',compact('he_dieu_hanh'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
        ]);
        $he_dieu_hanh=HeDieuHanh::where('id',$request->id)->update(['ten'=>$request->ten]);

        return redirect()->route('he-dieu-hanh.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $he_dieu_hanh=HeDieuHanh::find($id);
       
        if(empty($he_dieu_hanh)){
            return "xóa thất bại";
        }
        $he_dieu_hanh->delete();
        return redirect()->route('he-dieu-hanh.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

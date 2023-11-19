<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhangNuoc;
class KhangNuocController extends Controller
{
    public function danhSach(){
        $lst_khangnuoc=KhangNuoc::paginate(5);

        if($ten = request()->ten)
        {
            $lst_khangnuoc=KhangNuoc::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai.khang-nuoc.danh-sach',compact('lst_khangnuoc'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai.khang-nuoc.them-moi');
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
        ]);
        $khang_nuoc=KhangNuoc::create(['ten'=>$request->ten]);

        return redirect()->route('khang-nuoc.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $khang_nuoc=KhangNuoc::find($id);
        return view('thong-so-dien-thoai.khang-nuoc.cap-nhat',compact('khang_nuoc'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
        ]);
        $khang_nuoc=KhangNuoc::where('id',$request->id)->update(['ten'=>$request->ten]);

        return redirect()->route('khang-nuoc.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $khang_nuoc=KhangNuoc::find($id);
       
        if(empty($khang_nuoc)){
            return "xóa thất bại";
        }
        $khang_nuoc->delete();
        return redirect()->route('khang-nuoc.danh-sach')->with('thong_bao','Xóa thành công');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongSo;
class ThongSoController extends Controller
{
    //
    public function danhSach(){
        $lst_thong_so = ThongSo::paginate(5);
        if($ten = request()->ten)
        {
            $lst_thong_so = ThongSo::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('san-pham/thong-so/danh-sach', compact('lst_thong_so'));
    }
    public function themMoi(){
        return view('san-pham/thong-so/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $mau = new ThongSo();
       $mau->ten = $request->ten;
       $mau->save();
       return redirect()->route('thong-so.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $thong_so = ThongSo::find($id);
        return view('san-pham/thong-so/cap-nhat', compact('thong_so'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $mau = ThongSo::find($id);
        $mau->ten = $request->ten;
        $mau->save();
        return redirect()->route('thong-so.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $mau = ThongSo::find($id);
        $mau->delete();
        return redirect()->route('thong-so.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

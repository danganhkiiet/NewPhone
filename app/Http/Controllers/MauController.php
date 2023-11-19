<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mau;
class MauController extends Controller
{
    //
    public function danhSach(){
        $lst_mau = Mau::paginate(5);
        if($ten = request()->ten)
        {
            $lst_mau = Mau::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/mau/danh-sach', compact('lst_mau'));
    }
    public function themMoi(){
        return view('mau.them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $mau = new Mau();
       $mau->ten = $request->ten;
       $mau->save();
       return redirect()->route('thong-so-dien-thoai/mau/danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $mau = Mau::find($id);
        return view('thong-so-dien-thoai/mau/cap-nhat', compact('mau'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $mau = Mau::find($id);
        $mau->ten = $request->ten;
        $mau->save();
        return redirect()->route('mau.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $mau = Mau::find($id);
        $mau->delete();
        return redirect()->route('mau.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

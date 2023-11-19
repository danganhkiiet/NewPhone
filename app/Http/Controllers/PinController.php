<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function danhSach(){
        $lst_pin = Pin::paginate(5);
        if($ten = request()->ten)
        {
            $lst_pin = Pin::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/pin/danh-sach', compact('lst_pin'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/pin/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $pin = new Pin();
       $pin->ten = $request->ten;
       $pin->save();
       return redirect()->route('pin.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $pin = Pin::find($id);
        return view('thong-so-dien-thoai/pin/cap-nhat', compact('pin'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $pin = Pin::find($id);
        $pin->ten = $request->ten;
        $pin->save();
        return redirect()->route('pin.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $pin = Pin::find($id);
        $pin->delete();
        return redirect()->route('pin.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DungLuong;
use Illuminate\Http\Request;

class DungLuongController extends Controller
{
    //
    public function danhSach(){
        $lst_dluong = DungLuong::paginate(5);
        if($ten = request()->ten)
        {
            $lst_dluong = DungLuong::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('san-pham.dung-luong.danh-sach', compact('lst_dluong'));
    }
    public function themMoi(Request $request){
        $dluong = new DungLuong();
        $dluong->ten = $request->ten;
        $dluong->save();
        return response()->json(['message'=>'Thêm Thành Công']);
    }
    
    public function capNhat($id){
        $dluong = DungLuong::find($id);
        
        return $dluong;
    }
    
    public function xuLyCapNhat(Request $request){
        $dluong = DungLuong::find($request->id);
        $dluong->ten = $request->ten;
        $dluong->save();
        return response()->json(['message'=>'Cập Nhật Thành Công']);
    }
    public function xoa($id){
        $dluong = DungLuong::find($id);
        
        $dluong->delete();
        return redirect()->route('dung-luong.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

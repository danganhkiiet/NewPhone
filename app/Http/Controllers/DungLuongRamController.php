<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DungLuongRam;
class DungLuongRamController extends Controller
{
    public function danhSach(){
        $lst_dungluongram=DungLuongRam::paginate(5);

        if($ten = request()->ten)
        {
            $lst_dungluongram=DungLuongRam::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai.dung-luong-ram.danh-sach',compact('lst_dungluongram'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai.dung-luong-ram.them-moi');
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
        ]);
        $dung_luong_ram=DungLuongRam::create(['ten'=>$request->ten]);

        return redirect()->route('dung-luong-ram.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $dung_luong_ram=DungLuongRam::find($id);
        return view('thong-so-dien-thoai.dung-luong-ram.cap-nhat',compact('dung_luong_ram'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
        ]);
        $dung_luong_ram=DungLuongRam::where('id',$request->id)->update(['ten'=>$request->ten]);

        return redirect()->route('dung-luong-ram.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $dung_luong_ram=DungLuongRam::find($id);
       
        if(empty($dung_luong_ram)){
            return "xóa thất bại";
        }
        $dung_luong_ram->delete();
        return redirect()->route('dung-luong-ram.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

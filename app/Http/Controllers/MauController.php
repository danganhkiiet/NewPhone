<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MauSac;
class MauController extends Controller
{
    //
    public function danhSach(){
        $lst_mau = MauSac::paginate(5);
        if($ten = request()->ten)
        {
            $lst_mau = Mau::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('san-pham.mau-sac.danh-sach', compact('lst_mau'));
    }
    public function themMoi(Request $request){
        $mau = new MauSac();
        $mau->ten = $request->ten;
        $mau->save();
        return response()->json(['message'=>'Thêm Thành Công']);
    }
    
    public function capNhat($id){
        $mau = MauSac::find($id);
        
        return $mau;
    }
    
    public function xuLyCapNhat(Request $request){
        $mau = MauSac::find($request->id);
        $mau->ten = $request->ten;
        $mau->save();
        return response()->json(['message'=>'Cập Nhâtj Thành Công']);
    }
    public function xoa($id){
        $mau = MauSac::find($id);
        
        $mau->delete();
        return redirect()->route('mau-sac.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

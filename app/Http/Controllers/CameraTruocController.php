<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CameraTruoc;
class CameraTruocController extends Controller
{
    //
    public function danhSach(){
        $lst_camera_truoc = CameraTruoc::paginate(5);
        if($ten = request()->ten)
        {
            $lst_camera_truoc = CameraTruoc::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/camera-truoc/danh-sach', compact('lst_camera_truoc'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/camera-truoc/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $camera_truoc = new CameraTruoc();
       $camera_truoc->ten = $request->ten;
       $camera_truoc->save();
       return redirect()->route('camera-truoc.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $camera_truoc = CameraTruoc::find($id);
        return view('thong-so-dien-thoai/camera-truoc/cap-nhat', compact('camera_truoc'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $camera_truoc = CameraTruoc::find($id);
        $camera_truoc->ten = $request->ten;
        $camera_truoc->save();
        return redirect()->route('camera-truoc.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $camera_truoc = CameraTruoc::find($id);
        $camera_truoc->delete();
        return redirect()->route('camera-truoc.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

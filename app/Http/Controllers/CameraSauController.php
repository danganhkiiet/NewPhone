<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CameraSau;
class CameraSauController extends Controller
{
    //
    public function danhSach(){
        $lst_camera_sau = CameraSau::paginate(5);
        if($ten = request()->ten)
        {
            $lst_camera_sau = CameraSau::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/camera-sau/danh-sach', compact('lst_camera_sau'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/camera-sau/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $camera_sau = new CameraSau();
       $camera_sau->ten = $request->ten;
       $camera_sau->save();
       return redirect()->route('camera-sau.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $camera_sau = CameraSau::find($id);
        return view('thong-so-dien-thoai/camera-sau/cap-nhat', compact('camera_sau'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $camera_sau = CameraSau::find($id);
        $camera_sau->ten = $request->ten;
        $camera_sau->save();
        return redirect()->route('camera-sau.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $camera_sau = CameraSau::find($id);
        $camera_sau->delete();
        return redirect()->route('camera-sau.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

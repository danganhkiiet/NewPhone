<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoNhoTrong;
class BoNhoTrongController extends Controller
{
    //
    public function danhSach(){
        $lst_bo_nho_trong = BoNhoTrong::paginate(5);
        if($ten = request()->ten)
        {
            $lst_bo_nho_trong = BoNhoTrong::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/bo-nho-trong/danh-sach', compact('lst_bo_nho_trong'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/bo-nho-trong/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $bo_nho_trong = new BoNhoTrong();
       $bo_nho_trong->ten = $request->ten;
       $bo_nho_trong->save();
       return redirect()->route('bo-nho-trong.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $bo_nho_trong = BoNhoTrong::find($id);
        return view('thong-so-dien-thoai/bo-nho-trong/cap-nhat', compact('bo_nho_trong'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $bo_nho_trong = BoNhoTrong::find($id);
        $bo_nho_trong->ten = $request->ten;
        $bo_nho_trong->save();
        return redirect()->route('bo-nho-trong.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $bo_nho_trong = BoNhoTrong::find($id);
        $bo_nho_trong->delete();
        return redirect()->route('bo-nho-trong.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

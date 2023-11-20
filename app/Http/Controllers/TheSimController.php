<?php

namespace App\Http\Controllers;

use App\Models\TheSim;
use Illuminate\Http\Request;

class TheSimController extends Controller
{
    public function danhSach(){
        $lst_thesim = TheSim::paginate(5);
        if($ten = request()->ten)
        {
            $lst_thesim = TheSim::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/the-sim/danh-sach', compact('lst_thesim'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/the-sim/them-moi');
    }
    public function xuLyThemMoi(Request $request){
       $thesim = new TheSim();
       $thesim->ten = $request->ten;
       $thesim->save();
       return redirect()->route('the-sim.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
        $thesim = TheSim::find($id);
        return view('thong-so-dien-thoai/the-sim/cap-nhat', compact('thesim'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $thesim = TheSim::find($id);
        $thesim->ten = $request->ten;
        $thesim->save();
        return redirect()->route('the-sim.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
        $thesim = TheSim::find($id);
        $thesim->delete();
        return redirect()->route('the-sim.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

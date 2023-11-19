<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongSac;
class CongSacController extends Controller
{
     public function danhSach(){
        $lst_congsac=CongSac::paginate(5);

        if($ten = request()->ten)
        {
            $lst_congsac=CongSac::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('cong-sac.danh-sach',compact('lst_congsac'));
    }
    public function themMoi(){
        return view('cong-sac.them-moi');
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
        ]);
        $cong_sac=CongSac::create(['ten'=>$request->ten]);

        return redirect()->route('cong-sac.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $cong_sac=CongSac::find($id);
        return view('cong-sac.cap-nhat',compact('cong_sac'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
        ]);
        $cong_sac=CongSac::where('id',$request->id)->update(['ten'=>$request->ten]);

        return redirect()->route('cong-sac.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $cong_sac=CongSac::find($id);
       
        if(empty($cong_sac)){
            return "xóa thất bại";
        }
        $cong_sac->delete();
        return redirect()->route('cong-sac.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

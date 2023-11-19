<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoPhanGiaiManHinh;
class DoPhanGiaiManHinhController extends Controller
{
    public function danhSach(){
        $lst_dophangiaimanhinh=DoPhanGiaiManHinh::paginate(5);

        if($ten = request()->ten)
        {
            $lst_dophangiaimanhinh=DoPhanGiaiManHinh::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai.do-phan-giai-man-hinh.danh-sach',compact('lst_dophangiaimanhinh'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai.do-phan-giai-man-hinh.them-moi');
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
        ]);
        $do_phan_giai_man_hinh=DoPhanGiaiManHinh::create(['ten'=>$request->ten]);

        return redirect()->route('do-phan-giai-man-hinh.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $do_phan_giai_man_hinh=DoPhanGiaiManHinh::find($id);
        return view('thong-so-dien-thoai.do-phan-giai-man-hinh.cap-nhat',compact('do_phan_giai_man_hinh'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
        ]);
        $do_phan_giai_man_hinh=DoPhanGiaiManHinh::where('id',$request->id)->update(['ten'=>$request->ten]);

        return redirect()->route('do-phan-giai-man-hinh.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $do_phan_giai_man_hinh=DoPhanGiaiManHinh::find($id);
       
        if(empty($do_phan_giai_man_hinh)){
            return "xóa thất bại";
        }
        $do_phan_giai_man_hinh->delete();
        return redirect()->route('do-phan-giai-man-hinh.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

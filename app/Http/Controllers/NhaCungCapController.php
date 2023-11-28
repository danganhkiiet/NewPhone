<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
class NhaCungCapController extends Controller
{
    public function danhSach(){
        $lst_nhacungcap=NhaCungCap::paginate(5);

        if($ten = request()->ten)
        {
            $lst_nhacungcap=NhaCungCap::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('nha-cung-cap.danh-sach',compact('lst_nhacungcap'));
    }
    public function themMoi(Request $request){
        $nhacungcap = new NhaCungCap();
        $nhacungcap->ten=$request->ten;
        $nhacungcap->dia_chi=$request->dia_chi;
        $nhacungcap->email=$request->email;
        $nhacungcap->so_dien_thoai=$request->so_dien_thoai;
        $nhacungcap->save();
        return response()->json(['message'=>'Thêm Thành Công']);
    }
    public function xuLyThemMoi(Request $request){
        $request->validate([
            'ten' => 'required',
            'dia_chi' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required ',
        ]);
        $nhacungcap=NhaCungCap::create(['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);

        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $nha_cung_cap=NhaCungCap::find($id);
        return $nha_cung_cap;
    }
    
    public function xuLyCapNhat(Request $request, $id){
        $request->validate([
            'ten' => 'required',
            'dia_chi' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required',
        ]);
        $nhacungcap=NhaCungCap::where('id',$request->id)->update(['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);

        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $nha_cung_cap=NhaCungCap::find($id);
       
        if(empty($nha_cung_cap)){
            return "xóa thất bại";
        }
        $nha_cung_cap->delete();
        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Xóa thành công');
    }
    
}

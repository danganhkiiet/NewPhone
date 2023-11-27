<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
class NhaSanXuatController extends Controller
{
    //
    public function danhSach(){
        $lst_nhasanxuat=NhaSanXuat::paginate(5);

        if($ten = request()->ten)
        {
            $lst_nhasanxuat=NhaSanXuat::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('nha-san-xuat.danh-sach',compact('lst_nhasanxuat'));
    }
    public function themMoi(Request $request){
        $nha_san_xuat=NhaSanXuat::create(['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);

        return response()->json(['message'=>'Thêm Thành Công']);
    }
    public function capNhat($id){

        $lst_nhacungcap=NhaSanXuat::find($id);

        return $lst_nhacungcap;
    }
    public function xuLyCapNhat(Request $request){

        $nha_san_xuat=NhaSanXuat::where('id',$request->id)->update(['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);

        return response()->json(['message'=>'Cập Nhật Thành Công']);
    }
}

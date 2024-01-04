<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuXuat;
use App\Models\ChiTietPhieuXuat;
use App\Models\GioHang;
class APIPhieuXuatController extends Controller
{
    public function themMoi(Request $request)
    {
  
      //tạo phiếu xuất mới
        $phieu_xuat = new PhieuXuat();
        $phieu_xuat -> khach_hang_id = $request->khach_hang_id;
        $phieu_xuat -> trang_thai_don_hang_id = 1;
        $phieu_xuat -> tong_tien = $request -> tong_tien;
        $phieu_xuat->save();

      //tạo chi tiết phiếu xuất
        $gio_hang = GioHang::with('chi_tiet_dien_thoai')->where('khach_hang_id',$request->khach_hang_id)->get();
        foreach($gio_hang as $gh)
        {
    
            $ctpx = new ChiTietPhieuXuat();
            $ctpx -> chi_tiet_dien_thoai_id = $gh -> chi_tiet_dien_thoai_id;
            $ctpx -> phieu_xuat_id = $phieu_xuat->id;
            $ctpx -> so_luong = $gh -> so_luong;
            $ctpx -> gia_ban = $gh->chi_tiet_dien_thoai->gia_ban;
            $ctpx -> thanh_tien = $gh->chi_tiet_dien_thoai->gia_ban * $gh -> so_luong;
            $ctpx->save();
            $gh->delete();
        }
        return response()->json([
            'status'=>200,
            'messages'=> 'Đặt hàng thành công'
        ]);
    }
}

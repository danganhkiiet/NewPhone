<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDienThoai;
use Illuminate\Http\Request;
use App\Models\PhieuXuat;
use App\Models\ChiTietPhieuXuat;
use App\Models\GioHang;
use App\Models\KhachHang;

class APIPhieuXuatController extends Controller
{
  public function themMoi(Request $request)
  {

    //tạo phiếu xuất mới
    $phieu_xuat = new PhieuXuat();
    $phieu_xuat->khach_hang_id = $request->khach_hang_id;
    $phieu_xuat->trang_thai_don_hang_id = 1;
    $phieu_xuat->tong_tien = $request->tong_tien;
    if ($request->trang_thai_thanh_toan) {
      $phieu_xuat->trang_thai_thanh_toan = $request->trang_thai_thanh_toan;
    }
    $phieu_xuat->save();

    //tạo chi tiết phiếu xuất
    $gio_hang = GioHang::with('chi_tiet_dien_thoai')->where('khach_hang_id', $request->khach_hang_id)->get();
    foreach ($gio_hang as $gh) {


      $ctpx = new ChiTietPhieuXuat();
      $ctpx->chi_tiet_dien_thoai_id = $gh->chi_tiet_dien_thoai_id;
      $ctpx->phieu_xuat_id = $phieu_xuat->id;
      $ctpx->so_luong = $gh->so_luong;
      $ctpx->gia_ban = $gh->chi_tiet_dien_thoai->gia_ban;
      $ctpx->thanh_tien = $gh->chi_tiet_dien_thoai->gia_ban * $gh->so_luong;
      $ctpx->save();


      //cap nhat lai so luong
      $ctdt = ChiTietDienThoai::find($gh->chi_tiet_dien_thoai_id);
      $ctdt->so_luong = $ctdt->so_luong - $gh->so_luong;
      $ctdt->save();

      $gh->delete();
    }
    return response()->json([
      'status' => 200,
      'messages' => 'Đặt hàng thành công',
      'data' => $phieu_xuat->id
    ]);
  }
  public function huyDon(){
    $phieu_xuat=PhieuXuat::where('khach_hang_id',request('khach_hang_id'))->where('id',request('id_phieu_xuat'))->first();
    $phieu_xuat->trang_thai_don_hang_id=request('trang_thai_don_hang_id');
    $phieu_xuat->save();
    return response()->json([
      'status' => 200,
      'messages' => 'Hủy thành công'
    ]);
  }
  public function xetDonHangDaMua()
  {
    // dd(request());
    $phieu_xuat = PhieuXuat::where('khach_hang_id', request('khach_hang_id'))->where('trang_thai_don_hang_id',4)->get();
    // dd($phieu_xuat);
    $chi_tiet_phieu_xuat=[];
    $chi_tiet_dien_thoai=[];
    foreach ($phieu_xuat as $px) {
      $chi_tiet_phieu_xuat = ChiTietPhieuXuat::where('phieu_xuat_id', $px->id)->get();
    }

    foreach($chi_tiet_phieu_xuat as $ctpx){
      $chi_tiet_dien_thoai=ChiTietDienThoai::where('id',$ctpx->chi_tiet_dien_thoai_id)->get();
    }

    return response()->json([
      'status' => 200,
      'data' => $chi_tiet_dien_thoai,
      'messages' => 'Phiếu đã đặt thành công'
    ]);
  }
}

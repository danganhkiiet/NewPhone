<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuXuat;
use App\Models\ChiTietPhieuXuat;
class APIPhieuXuatController extends Controller
{
    public function themMoi(Request $request)
    {
        if($request->all()==null)
        {
            return response()->json([
                'status'=>422,
                'messages'=> 'Yêu cầu rỗng'
            ]);
        }
        $phieu_xuat = new PhieuXuat();
        $phieu_xuat -> khach_hang_id = $request->khach_hang_id;
        $phieu_xuat -> trang_thai_don_hang_id = 1;
        $phieu_xuat -> tong_tien = $request -> tong_tien;
        $phieu_xuat->save();

        for($i = 0; $i < count($request->chi_tiet_dien_thoai_id); $i++)
        {
            $ctpx = new ChiTietPhieuXuat();
            $ctpx->chi_tiet_dien_thoai_id = $request->chi_tiet_dien_thoai_id[$i];
            $ctpx->phieu_xuat_id =$phieu_xuat->id;
            $ctpx->so_luong = $request->so_luong[$i];
            $ctpx->gia_ban = $request->gia_ban[$i];
            $ctpx->thanh_tien = $request->thanh_tien[$i];
            $ctpx->save();
        }
        return response()->json([
            'status'=>200,
            'messages'=> 'Đặt hàng thành công'
        ]);
    }
}

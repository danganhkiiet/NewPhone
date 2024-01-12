<?php

namespace App\Http\Controllers;

use App\Http\Resources\YeuThichResource;
use App\Models\YeuThich;
use Illuminate\Http\Request;

class APIYeuThichController extends Controller
{
    public function themMoi(Request $request)
    {
        $dien_thoai_trung = YeuThich::where('khach_hang_id', $request->khach_hang_id)->where('chi_tiet_dien_thoai_id', $request->chi_tiet_dien_thoai_id)->first();
        if (!empty($dien_thoai_trung)) {
            $dien_thoai_trung->so_luong += $request->so_luong;
            $dien_thoai_trung->save();
        } else {
            $yeu_thich = YeuThich::create(['khach_hang_id' => $request->khach_hang_id, 'chi_tiet_dien_thoai_id' => $request->chi_tiet_dien_thoai_id]);
        }
        return response()->json(
            [
                'success' => true,
                'status' => 200,
                'messages' => 'Thêm vào danh sách yêu thích thành công',
            ]
        );
    }
  
    public function danhSachYeuThichKhachHang()
    {
        $yeu_thich = YeuThich::where("khach_hang_id", request('khach_hang_id'))->get();
        $api_yeu_thich = YeuThichResource::collection($yeu_thich);
        if ($api_yeu_thich) {
            return $this->apiResource(true, 200, $api_yeu_thich, 'Danh Sách Yêu Thích Chi Tiết');
        }
        return $this->apiResource();
    }
    // public function capNhatSoLuongGioHang()
    // {
    //     $khach_hang_id = request('khach_hang_id');
    //     $chi_tiet_dien_thoai_id = request('chi_tiet_dien_thoai_id');
    //     $so_luong_moi = request('so_luong');

    //     $gio_hang = GioHang::where("khach_hang_id", $khach_hang_id)
    //         ->where('chi_tiet_dien_thoai_id', $chi_tiet_dien_thoai_id)
    //         ->first();

    //     if ($gio_hang) {
    //         $gio_hang->so_luong = $so_luong_moi;
    //         $gio_hang->save();

    //         $api_gio_hang = new GioHangResource($gio_hang);

    //         return $this->apiResource(true, 200, $api_gio_hang, 'Danh Sách Giỏ Hàng Cập Nhật Số Lượng');
    //     }

    //     return $this->apiResource();
    // }
    public function xoaYeuThich()
    {
        $khach_hang_id = request('khach_hang_id');
        $chi_tiet_dien_thoai_id = request('chi_tiet_dien_thoai_id');

        $yeu_thich = YeuThich::where("khach_hang_id", $khach_hang_id)
            ->where('chi_tiet_dien_thoai_id', $chi_tiet_dien_thoai_id)
            ->first();

        if ($yeu_thich) {
            $yeu_thich->delete();
            $yeu_thich->save();

            $api_yeu_thich = new YeuThichResource($yeu_thich);

            return $this->apiResource(true, 200, $api_yeu_thich, 'Danh Sách Yêu Thích Mới Được Xóa');
        }
    }
    public function apiResource($success = false, $status = 200, $data = null, $messages = null)
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'status' => $data == null ? 404 : $status,
            'messages' => $data == null && $messages == null ? 'Không Tìm Thấy Dữ Liệu' : $messages
        ]);
    }
}

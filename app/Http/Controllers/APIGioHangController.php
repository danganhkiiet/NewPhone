<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Http\Resources\GioHangResource;
use App\Models\ChiTietDienThoai;

class APIGioHangController extends Controller
{
    public function themMoi(Request $request)
    {
        $dien_thoai_trung = GioHang::where('khach_hang_id', $request->khach_hang_id)->where('chi_tiet_dien_thoai_id', $request->chi_tiet_dien_thoai_id)->first();
        if (!empty($dien_thoai_trung)) {
            $dien_thoai_trung->so_luong += $request->so_luong;
            $dien_thoai_trung->save();
        } else {
            $gio_hang = GioHang::create(['khach_hang_id' => $request->khach_hang_id, 'chi_tiet_dien_thoai_id' => $request->chi_tiet_dien_thoai_id, 'so_luong' => $request->so_luong]);
        }
        return response()->json(
            [
                'success' => true,
                'status' => 200,
                'messages' => 'Thêm vào giỏ hàng thành công',
            ]
        );
    }
    public function danhSachGioHangKhachHang()
    {
        $gio_hang = GioHang::where("khach_hang_id", request('khach_hang_id'))->get();
        // dd($gio_hang);
        $api_gio_hang = GioHangResource::collection($gio_hang);
        // $api_dien_thoai=null;
        if ($api_gio_hang) {
            return $this->apiResource(true, 200, $api_gio_hang, 'Danh Sách Giỏ Hàng Chi Tiết');
        }
        return $this->apiResource();
    }
    public function capNhatSoLuongGioHang()
    {
        $khach_hang_id = request('khach_hang_id');
        $chi_tiet_dien_thoai_id = request('chi_tiet_dien_thoai_id');
        $so_luong_moi = request('so_luong');

        $gio_hang = GioHang::where("khach_hang_id", $khach_hang_id)
            ->where('chi_tiet_dien_thoai_id', $chi_tiet_dien_thoai_id)
            ->first();

        if ($gio_hang) {
            $gio_hang->so_luong = $so_luong_moi;
            $gio_hang->save();

            $api_gio_hang = new GioHangResource($gio_hang);

            return $this->apiResource(true, 200, $api_gio_hang, 'Danh Sách Giỏ Hàng Cập Nhật Số Lượng');
        }

        return $this->apiResource();
    }
    public function xoaGioHang()
    {
        $khach_hang_id = request('khach_hang_id');
        $chi_tiet_dien_thoai_id = request('chi_tiet_dien_thoai_id');

        $gio_hang = GioHang::where("khach_hang_id", $khach_hang_id)
            ->where('chi_tiet_dien_thoai_id', $chi_tiet_dien_thoai_id)
            ->first();

        if ($gio_hang) {
            $gio_hang->delete();
            $gio_hang->save();

            $api_gio_hang = new GioHangResource($gio_hang);

            return $this->apiResource(true, 200, $api_gio_hang, 'Danh Sách Giỏ Hàng Mới Được Xóa');
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

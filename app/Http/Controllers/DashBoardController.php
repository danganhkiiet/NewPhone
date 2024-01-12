<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuXuat;
use App\Models\DienThoai;
use App\Models\KhachHang;
use App\Models\NhaSanXuat;
use App\Models\PhieuNhap;
use App\Models\ChiTietDienThoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PhieuXuat;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(Request $request)
    {
       
        return view('dashboard');
    }
    public function thongSoBanHang(Request $request)
    {

        $doanh_thu = PhieuXuat::where('trang_thai_don_hang_id', 4)
        ->whereYear('created_at', $request->year)
        ->whereMonth('created_at',  $request->month)
        ->sum('tong_tien');

        $doanh_thu_theo_thang = [];
        for ($month = 1; $month <= 12; $month++) {
            $total = PhieuXuat::where('trang_thai_don_hang_id', 4)
                ->whereYear('created_at', $request->year)
                ->whereMonth('created_at', $month)
                ->sum('tong_tien');

            $doanh_thu_theo_thang[] = $total;
        }

        $phi_nhap_hang = PhieuNhap::whereYear('created_at', $request->year)
        ->whereMonth('created_at',  $request->month)
        ->sum('tong_tien');

        $phi_nhap_hang_theo_thang = [];
        for ($month = 1; $month <= 12; $month++) {
            $total = PhieuNhap::whereYear('created_at', $request->year)
                ->whereMonth('created_at', $month)
                ->sum('tong_tien');
            $phi_nhap_hang_theo_thang[] = $total;
        }
        


        $don_hang = PhieuXuat::whereYear('created_at', $request->year)
        ->whereMonth('created_at', $request->month)
        ->count();

        $don_hang_theo_thang = [];
        for ($month = 1; $month <= 12; $month++) {
            $dh = PhieuXuat::whereYear('created_at', $request->year)
            ->whereMonth('created_at', $month)
            ->count();
            $don_hang_theo_thang[] = $dh;
        }


        $luot_dang_ky = KhachHang::whereYear('created_at', $request->year)
        ->whereMonth('created_at', $request->month)
        ->count();

        $luot_dang_ky_theo_thang = [];
        for ($month = 1; $month <= 12; $month++) {
            $lkd = KhachHang::whereYear('created_at', $request->year)
            ->whereMonth('created_at', $month)
            ->count();
            $luot_dang_ky_theo_thang[] = $lkd;
        }

        $don_hang_theo_trang_thai = PhieuXuat::selectRaw('trang_thai_don_hang_id, COUNT(*) as so_luong')
        ->whereYear('created_at', $request->year)
        ->groupBy('trang_thai_don_hang_id')
        ->pluck('so_luong', 'trang_thai_don_hang_id');

        $so_luong_theo_nha_san_xuat = ChiTietDienThoai::join('dien_thoai', 'chi_tiet_dien_thoai.dien_thoai_id', '=', 'dien_thoai.id')
        ->selectRaw('dien_thoai.nha_san_xuat_id, SUM(chi_tiet_dien_thoai.so_luong) as so_luong') 
        ->groupBy('dien_thoai.nha_san_xuat_id')
        ->pluck('so_luong', 'nha_san_xuat_id');
    

        $ten_nha_san_xuat = NhaSanXuat::selectRaw('ten') ->pluck('ten');

        
        $so_luong_ton = ChiTietDienThoai::sum('so_luong');

        $so_luong_ban = ChiTietPhieuXuat::sum('so_luong');

        $don_hang_hoan_thanh = PhieuXuat::where('trang_thai_don_hang_id', 4) -> count();

        $tong_thanh_vien = KhachHang::where('trang_thai', 0) -> count();

        $data = [
            'doanh_thu'=> $doanh_thu,
            'phi_nhap_hang'=> $phi_nhap_hang,
            'don_hang'=> $don_hang,
            'luot_dang_ky'=> $luot_dang_ky,
            'phi_nhap_hang_theo_thang' => $phi_nhap_hang_theo_thang,
            'doanh_thu_theo_thang' => $doanh_thu_theo_thang,
            'don_hang_theo_thang' => $don_hang_theo_thang,
            'luot_dang_ky_theo_thang' => $luot_dang_ky_theo_thang,
            'don_hang_theo_trang_thai' => $don_hang_theo_trang_thai,
            'so_luong_theo_nha_san_xuat' => $so_luong_theo_nha_san_xuat,
            'ten_nha_san_xuat' => $ten_nha_san_xuat,
            'so_luong_ton' => $so_luong_ton,
            'so_luong_ban' => $so_luong_ban,
            'don_hang_hoan_thanh' => $don_hang_hoan_thanh,
            'tong_thanh_vien' => $tong_thanh_vien,
        ];
        // Kết quả là $totalRevenue sẽ chứa tổng doanh thu từ tất cả các đơn hàng đã hoàn thành

        return response()->json($data);
    }
}

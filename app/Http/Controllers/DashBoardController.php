<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\PhieuNhap;
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

        $luot_dang_ky = KhachHang::whereYear('created_at', $request->year)
        ->whereMonth('created_at', $request->month)
        ->count();
    

        $data = [
            'doanh_thu'=> $doanh_thu,
            'phi_nhap_hang'=> $phi_nhap_hang,
            'don_hang'=> $don_hang,
            'luot_dang_ky'=> $luot_dang_ky,
            'phi_nhap_hang_theo_thang' => $phi_nhap_hang_theo_thang,
            'doanh_thu_theo_thang' => $doanh_thu_theo_thang,
        ];
        // Kết quả là $totalRevenue sẽ chứa tổng doanh thu từ tất cả các đơn hàng đã hoàn thành

        return response()->json($data);
    }
}

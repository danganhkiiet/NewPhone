<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DienThoai;
use App\Models\ChiTietDienThoai;
use App\Http\Resources\DienThoaiResource;
use App\Http\Resources\ChiTietDienThoaiResource;
use App\Models\ChiTietPhieuXuat;
use App\Models\DanhGia;
use Illuminate\Support\Facades\DB;

class APIDienThoaiController extends Controller
{
    //
    public function danhSach()
    {
        $dien_thoai = DienThoai::all();
        $api_dien_thoai = DienThoaiResource::collection($dien_thoai);
        // $api_dien_thoai=null;
        if ($api_dien_thoai) {
            return $this->apiResource(true, 200, $api_dien_thoai, 'Danh Sách Điện Thoại');
        }
        return $this->apiResource();
    }
    public function danhSachChiTiet($id)
    {
        $dien_thoai = DienThoai::find($id);

        $api_dien_thoai = new DienThoaiResource($dien_thoai);
        // $api_dien_thoai=null;
        if ($api_dien_thoai) {
            return $this->apiResource(true, 200, $api_dien_thoai, 'Danh Sách Chi Tiết Điện Thoại');
        }
        return $this->apiResource();
    }
    public function danhSachLoc(Request $request)
    {
        // Lấy các giá trị từ request
        $filters = $request->filters;

        $query = ChiTietDienThoai::query();


        if (isset($filters['gia_ban'])) {
            $query->where('gia_ban', '>=', $filters['gia_ban']['gia_dau'])
                ->where('gia_ban', '<=', $filters['gia_ban']['gia_cuoi']);
        }
        // Kiểm tra và thêm điều kiện về mau_sac
        if (isset($filters['mau_sac'])) {
            $mau_sac_values = $filters['mau_sac'];
            // Sử dụng Closure để quản lý điều kiện liên quan đến 'mau_sac'
            //lý do sử dụng closure giúp định rõ phạm vi và sự tương tác giữa các điều kiện.
            $query->where(function ($query) use ($mau_sac_values) {
                foreach ($mau_sac_values as $mau) {
                    // Kiểm tra sự tồn tại của 'mau_sac_id' trong mỗi điều kiện
                    if (isset($mau['mau_sac_id'])) {
                        $query->orWhere('mau_sac_id', $mau['mau_sac_id']);
                    }
                }
            });
        }

        // Kiểm tra và thêm điều kiện về dung_luong
        if (isset($filters['dung_luong'])) {
            $dung_luong_values = $filters['dung_luong'];
            $query->where(function ($query) use ($dung_luong_values) {
                foreach ($dung_luong_values as $dung_luong) {
                    // Kiểm tra sự tồn tại của 'dung_luong_id' trong mỗi điều kiện
                    if (isset($dung_luong['dung_luong_id'])) {
                        $query->orWhere('dung_luong_id', $dung_luong['dung_luong_id']);
                    }
                }
            });
        }
        if (isset($filters['nha_san_xuat'])) {

            $nha_san_xuat = collect($filters['nha_san_xuat'])->values(); // Lấy giá trị của mảng
            // dd($nha_san_xuat);
            // Sử dụng whereIn để thêm điều kiện về nha_san_xuat_id từ bảng DienThoai
            $query->whereIn('dien_thoai_id', function ($query) use ($nha_san_xuat) {
                // Trong Closure này, chúng ta đang tạo một câu truy vấn con
                $query->select('id')->from('dien_thoai')->whereIn('nha_san_xuat_id', $nha_san_xuat);
            });
        }


        $filteredProductsType = $query->get();
        //   dd($filteredProductsType);
        $api_dien_thoai_theo_gia = ChiTietDienThoaiResource::collection($filteredProductsType);
        // $api_dien_thoai=null;
        if ($api_dien_thoai_theo_gia) {
            return $this->apiResource(true, 200, $api_dien_thoai_theo_gia, 'Danh Sách Điện Thoại Lọc');
        }

        return $this->apiResource();
    }
    public function dienThoaiLienQuan()
    {
        // Lấy tất cả điện thoại có cùng nha_san_xuat_id nhưng id khác với dien_thoai_id
        $dien_thoai_lien_quan = DienThoai::where('nha_san_xuat_id', request('nha_san_xuat_id'))
            ->where('id', '!=', request('dien_thoai_id'))
            ->get();
        // dd($dien_thoai_lien_quan);
        $api_dien_thoai = DienThoaiResource::collection($dien_thoai_lien_quan);
        if ($api_dien_thoai) {
            return $this->apiResource(true, 200, $api_dien_thoai, 'Danh Sách Điện Thoại Liên Quan');
        }

        return $this->apiResource();
    }
    public function dienThoaiDuocDanhGiaNhieuNhat()
    {
        $dien_thoai_duoc_danh_gia_nhieu_nhat = DanhGia::select('dien_thoai_id', DB::raw('SUM(so_sao) as tong_sao'))
            ->groupBy('dien_thoai_id')
            ->orderByDesc('tong_sao')
            ->limit(3)
            ->with('dien_thoai')->with('dien_thoai.hinhAnh')->with('dien_thoai.chi_tiet_dien_thoai')->with('dien_thoai.chi_tiet_dien_thoai.mauSac')->with('dien_thoai.chi_tiet_dien_thoai.dungLuong')
            ->get();

        return $this->apiResource(true, 200, $dien_thoai_duoc_danh_gia_nhieu_nhat, "Danh Sách Điên Thoại Được Đánh Giá Nhiều Nhất");
    }
    public function dienThoaiLuotMuaNhieuNhat()
    {
        $dien_thoai_luot_mua_nhieu_nhat = ChiTietPhieuXuat::select('chi_tiet_dien_thoai_id', DB::raw('SUM(so_luong) as tong_luot_mua'))
            ->groupBy('chi_tiet_dien_thoai_id')
            ->orderByDesc('tong_luot_mua')
            ->limit(3)
            ->with('chi_tiet_dien_thoai')->with('chi_tiet_dien_thoai.mauSac')->with('chi_tiet_dien_thoai.dungLuong')->with('chi_tiet_dien_thoai.dienThoai')->with('chi_tiet_dien_thoai.dienThoai.hinhAnh')
            ->get();

        return $this->apiResource(true, 200, $dien_thoai_luot_mua_nhieu_nhat, "Danh Sách Điên Thoại Được Đánh Giá Nhiều Nhất");
    }
    public function dienThoaiMoiNhat()
    {
        
        $dien_thoai_moi_nhat = ChiTietDienThoai::with('mauSac', 'dungLuong', 'dienThoai.hinhAnh')
        ->where('so_luong', '>', 2)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();
    

        return $this->apiResource(true, 200, $dien_thoai_moi_nhat, "Danh Sách Điên Thoại Mới Nhất");
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

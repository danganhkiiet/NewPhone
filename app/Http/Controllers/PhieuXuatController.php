<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuXuat;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Models\PhieuXuat;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PhieuXuatController extends Controller
{
    public function danhSachChoXacNhan(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $phieu_xuat = PhieuXuat::where('trang_thai_don_hang_id', 1)->get();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($phieu_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                ->addColumn('khach_hang_id', function ($row) {
                    return $row->khach_hang->ten;
                })
                ->addColumn('trang_thai_don_hang_id', function ($row) {
                    return $row->trang_thai_don_hang->ten;
                })
                ->addColumn('admin_id', function ($row) {
                    return "Chưa ai xác nhận";
                })
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-primary btn-detail"
                         data-id="' . $row->id . '">
                            <i class="fe fe-info"></i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('hoa-don.phieu-xuat.danh-sach-cho-xac-nhan-van-chuyen-da-huy');
    }
    public function danhSachDaXacNhan(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $phieu_xuat = PhieuXuat::where('trang_thai_don_hang_id', 2)->get();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($phieu_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                ->addColumn('khach_hang_id', function ($row) {
                    return $row->khach_hang->ten;
                })
                ->addColumn('trang_thai_don_hang_id', function ($row) {
                    return $row->trang_thai_don_hang->ten;
                })
                ->addColumn('admin_id', function ($row) {
                    return $row->admin->ho_ten;
                })
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-primary btn-detail"
                         data-id="' . $row->id . '">
                            <i class="fe fe-info"></i>
                    </button>';

                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('hoa-don.phieu-xuat.danh-sach-da-xac-nhan');
    }
    public function danhSachVanChuyen(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $phieu_xuat = PhieuXuat::where('trang_thai_don_hang_id', 3)->get();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($phieu_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                ->addColumn('khach_hang_ten', function ($row) {
                    return $row->khach_hang->ten;
                })
                ->addColumn('khach_hang_dia_chi', function ($row) {
                    return $row->khach_hang->dia_chi;
                })
                ->addColumn('khach_hang_so_dien_thoai', function ($row) {
                    return $row->khach_hang->so_dien_thoai;
                })
                ->addColumn('trang_thai_don_hang_id', function ($row) {
                    return $row->trang_thai_don_hang->ten;
                })
                ->addColumn('trang_thai_thanh_toan', function ($row) {
                    return $row->trang_thai_thanh_toan == 1 ? "Đã thanh toán" : "Chưa thanh toán";
                })
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-success btn-thanhcong"
                         data-id="' . $row->id . '">
                            <i class="fe fe-check"></i>
                    </button>';
                    $temp = $temp .
                        '<button type="button" class="btn btn-primary btn-detailtransport "
                        data-id="' . $row->id . '">
                            <i class="fe fe-info"></i>
                    </button>';
                    $temp = $temp . '<a href="' . route("phieu-xuat.in-pdf-phieu-van-chuyen", ['id' => $row->id]) . '" class="btn btn-info btn-inphieu">
                    <i class="fe fe-info"></i>
                     </a>';

                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('hoa-don.phieu-xuat.danh-sach-cho-xac-nhan-van-chuyen-da-huy');
    }
    public function danhSachDaHuy(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $phieu_xuat = PhieuXuat::where('trang_thai_don_hang_id', 5)->get();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($phieu_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                ->addColumn('khach_hang_id', function ($row) {
                    return $row->khach_hang->ten;
                })
                ->addColumn('trang_thai_don_hang_id', function ($row) {
                    return $row->trang_thai_don_hang->ten;
                })
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-primary "
                         data-id="' . $row->id . '">
                            <i class="fe fe-info"></i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('hoa-don.phieu-xuat.danh-sach-cho-xac-nhan-van-chuyen-da-huy');
    }
    public function danhSacThanhCong(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $phieu_xuat = PhieuXuat::where('trang_thai_don_hang_id', 4)->get();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($phieu_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                ->addColumn('khach_hang_id', function ($row) {
                    return $row->khach_hang->ten;
                })
                ->addColumn('trang_thai_don_hang_id', function ($row) {
                    return $row->trang_thai_don_hang->ten;
                })
                ->addColumn('admin_id', function ($row) {
                    return $row->admin->ho_ten;
                })
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-primary btn-detail"
                         data-id="' . $row->id . '">
                            <i class="fe fe-info"></i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('hoa-don.phieu-xuat.danh-sach-thanh-cong');
    }
    public function danhSachChiTiet($id)
    {
        $phieu_xuat = ChiTietPhieuXuat::with('chi_tiet_dien_thoai.dienThoai:id,ten')->with('chi_tiet_dien_thoai.mauSac:id,ten')->with('chi_tiet_dien_thoai.dungLuong:id,ten')->where('phieu_xuat_id', $id)->get();

        return response()->json($phieu_xuat);
    }
    public function capNhatChoXacNhan(Request $request, $id)
    {
        $phieu_xuat = PhieuXuat::find($id);
        $phieu_xuat->trang_thai_don_hang_id = $request->trang_thai_don_hang_id;
        $phieu_xuat->admin_id = Auth()->user()->id;
        $phieu_xuat->save();

        $phieu_xuat_xac_nhan = PhieuXuat::with('khach_hang:id,ten')->with('trang_thai_don_hang:id,ten')->where('trang_thai_don_hang_id', 1)->get();
        // dd($phieu_xuat_xac_nhan);
        return response()->json($phieu_xuat_xac_nhan);
    }
    public function capNhatDaXacNhan(Request $request, $id)
    {
        $phieu_xuat = PhieuXuat::find($id);
        $phieu_xuat->trang_thai_don_hang_id = $request->trang_thai_don_hang_id;
        $phieu_xuat->save();

        $phieu_xuat_xac_nhan = PhieuXuat::with('khach_hang:id,ten')->with('trang_thai_don_hang:id,ten')->where('trang_thai_don_hang_id', 2)->get();
        // dd($phieu_xuat_xac_nhan);
        return response()->json($phieu_xuat_xac_nhan);
    }
    public function capNhatPhieuVanChuyen(Request $request, $id)
    {
        $phieu_xuat = PhieuXuat::find($id);
        $phieu_xuat->trang_thai_don_hang_id = $request->trang_thai_don_hang_id;
        $phieu_xuat->save();

        $phieu_xuat_phieu_van_chuyen = PhieuXuat::with('khach_hang:id,ten,dia_chi,so_dien_thoai')->with('trang_thai_don_hang:id,ten')->where('trang_thai_don_hang_id', 3)->get();
        return response()->json($phieu_xuat_phieu_van_chuyen);
    }
    public function inRaPhieuPDFVanChuyen($id)
    {
        $phieu_xuat = PhieuXuat::where('id', $id)->first();

        $khach_hang = KhachHang::where('id', $phieu_xuat->khach_hang_id)->first();

        $chi_tiet_phieu_xuat = ChiTietPhieuXuat::where('phieu_xuat_id', $id)->get();

        $pdf = Pdf::loadView('hoa-don.phieu-xuat.phieu-hoa-don', compact('phieu_xuat', 'khach_hang', 'chi_tiet_phieu_xuat'));
        return $pdf->stream('phieu-hoa-don.pdf');
    }
}

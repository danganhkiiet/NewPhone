<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Mail;
use Yajra\DataTables\DataTables;

class khachhangController extends Controller
{
    //
    public function danhSach(Request $request)
    {
        if($request->ajax()){
            $khach_hang=KhachHang::all();

            return DataTables::of($khach_hang)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                //Thêm cột action cho từng bản
                ->addColumn('Action',function($row){
                    $temp=
                    '<button type="button" class="btn btn-danger btn-camtaikhoan"
                        ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                            <i class="fe fe-delete">Cấm tài khoản</i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('tai-khoan.khach-hang.danh-sach');
    }
    // public function themMoi(Request $request)
    // {
    // }
    // public function xuLyThemMoi(Request $request)
    // {
    //     $khach_hang = new khachhang();
    //     $khach_hang->ten = $request->ten;
    //     $khach_hang->email = $request->email;
    //     $khach_hang->dia_chi = $request->dia_chi;
    //     $khach_hang->so_dien_thoai = $request->so_dien_thoai;
    //     $khach_hang->password = Hash::make($request->password);
    //     $khach_hang->save();
    //     return redirect()->route('khach-hang.danh-sach')->with('thong_bao', 'Thêm mới thành công');
    // }

    // public function capNhat($id)
    // {
    //     $khach_hang = khachhang::find($id);
    //     return view('tai-khoan.khach-hang.cap-nhat', compact('khach_hang'));
    // }

    // public function xuLyCapNhat(Request $request, $id)
    // {
    //     $khach_hang = khachhang::find($id);
    //     $khach_hang->ten = $request->ten;
    //     $khach_hang->email = $request->email;
    //     $khach_hang->dia_chi = $request->dia_chi;
    //     $khach_hang->so_dien_thoai = $request->so_dien_thoai;
    //     $khach_hang->password = 1;
    //     $khach_hang->save();
    //     return redirect()->route('khach-hang.danh-sach')->with('thong_bao', 'Cập nhật thành công');
    // }
    public function xoa($id)
    {
        $khach_hang = khachhang::find($id);
        $khach_hang->delete();
        return response()->json(['message' => 'Xóa Thành công']);
    }
    public function quenMatKhau($token)
    {
        return view('tai-khoan.khach-hang.quen-mat-khau', compact('token'));
    }
    public function xacThucCapNhatQuenMatKhau(Request $request)
    {
        $khach_hang = KhachHang::where('token', $request->token)->first();
        if ($request->password === $request->xacnhanmatkhau) {
            if (!empty($khach_hang)) {

                $khach_hang->password = Hash::make($request->password);
                $khach_hang->token = null;
                $khach_hang->save();
                return redirect()->route('cap-nhat-mat-khau-thanh-cong')->with((['thong_bao' => 'đổi mật khẩu thành công']));
            }
        }

        return view();
    }
    public function quenMatKhauThanhCong()
    {
        return view('tai-khoan.khach-hang.quen-mat-khau-thanh-cong');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDienThoai;
use App\Models\DienThoaiThongSo;
use App\Models\ThongSo;
use App\Models\MauSac;
use App\Models\DienThoai;
use App\Models\DungLuong;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;
class DienThoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function themMoi()
    {
        $lst_thong_so = ThongSo::all();
        $lst_dung_luong = DungLuong::all();
        $lst_mau_sac = MauSac::all();
        $lst_nha_san_xuat = NhaSanXuat::all();
        return view('san-pham/dien-thoai/them-moi',compact('lst_thong_so','lst_dung_luong','lst_mau_sac','lst_nha_san_xuat'));
    }
    public function xuLyThemMoi(Request $request)
    {
        //them dien thoai moi
        $dien_thoai = new DienThoai();
        $dien_thoai->ten = $request->ten;
        $dien_thoai->nha_san_xuat_id= $request->nha_san_xuat_id;
        $dien_thoai->save();

        //duyet toan bo rq
        for($i = 0; $i < count($request->thong_so_id); $i = $i +1 )
        {
            // tao chi tiet dien thoai moi
            $chi_tiet_dien_thoai = new ChiTietDienThoai();
            $chi_tiet_dien_thoai->dien_thoai_id = $dien_thoai->id;
            $chi_tiet_dien_thoai->mau_sac_id = $request->mau_sac_id[$i];
            $chi_tiet_dien_thoai->dung_luong_id = $request->dung_luong_id[$i];
            $chi_tiet_dien_thoai->so_luong = 0;
            $chi_tiet_dien_thoai->gia_ban = 0;
            $chi_tiet_dien_thoai -> save();

            //tao dien thoai thong so
            $dien_thoai_thong_so = new DienThoaiThongSo();
            $dien_thoai_thong_so -> dien_thoai_id = $dien_thoai->id;
            $dien_thoai_thong_so -> thong_so_id = $request->thong_so_id[$i];
            $dien_thoai_thong_so -> gia_tri = $request->gia_tri[$i];
            $dien_thoai_thong_so -> save();
        }
        return 'them thanh cong';
    }
    /**
     * Show the form for creating a new resource.
     */
    public function danhSach()
    {
        $lst_chi_tiet_dien_thoai = ChiTietDienThoai::paginate(5);
        return view('san-pham/dien-thoai/danh-sach',compact('lst_chi_tiet_dien_thoai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function capNhat($id)
    {
        $chi_tiet_dien_thoai = ChiTietDienThoai::find($id);
        $dien_thoai = DienThoai::find($chi_tiet_dien_thoai -> dien_thoai_id);
      
        return view('san-pham/dien-thoai/cap-nhat',compact('dien_thoai','chi_tiet_dien_thoai'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $chi_tiet_dien_thoai = ChiTietDienThoai::find($id);
        $dien_thoai = DienThoai::find($chi_tiet_dien_thoai -> dien_thoai_id);
        
        $dien_thoai->mo_ta = $request->mo_ta;
        $dien_thoai->ten = $request->ten;
        $chi_tiet_dien_thoai->gia_ban = $request->gia_ban;

        $dien_thoai->save();
        $chi_tiet_dien_thoai->save();
        return ('thanh cong roi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

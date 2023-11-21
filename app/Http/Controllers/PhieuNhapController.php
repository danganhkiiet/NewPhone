<?php

namespace App\Http\Controllers;

use Database\Seeders\PhieuNhapSeeder;
use Illuminate\Http\Request;
use App\Models\PhieuNhap;
use App\Models\NhaCungCap;
use App\Models\ThongSo;
use App\Models\MauSac;
use App\Models\DungLuong;
class PhieuNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function themMoi()
    {
        $lst_nha_cung_cap = NhaCungCap::all();
        return view('hoa-don/phieu-nhap/them-moi-phieu-nhap',compact('lst_nha_cung_cap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function xuLyThemMoi(Request $request)
    {
        //them moi phieu nhap
        $phieu_nhap = new PhieuNhap();
        $phieu_nhap->thong_tin_nguoi_giao = $request->thong_tin_nguoi_giao;
        $phieu_nhap->nha_cung_cap_id=$request->nha_cung_cap_id;
        $phieu_nhap->ngay_nhap_hang = $request->ngay_nhap_hang;
        $phieu_nhap->tong_tien = 0;
        $phieu_nhap->admin_id = Auth()->user()->id;
        $phieu_nhap->save();
        return redirect()->route('phieu-nhap.them-moi-dien-thoai');
    }
    public function themMoiDienThoai()
    {
        $lst_thong_so = ThongSo::all();
        $lst_dung_luong = DungLuong::all();
        $lst_mau_sac = MauSac::all();
        return view('hoa-don/phieu-nhap/them-moi-dien-thoai',compact('lst_thong_so','lst_dung_luong','lst_mau_sac'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

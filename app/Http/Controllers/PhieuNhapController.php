<?php

namespace App\Http\Controllers;

use Database\Seeders\PhieuNhapSeeder;
use Illuminate\Http\Request;
use App\Models\PhieuNhap;
use App\Models\ChiTietPhieuNhap;
use App\Models\NhaCungCap;
use App\Models\NhaSanXuat;
use App\Models\MauSac;
use App\Models\DungLuong;
use App\Models\DienThoai;
use App\Models\ChiTietDienThoai;
use App\Http\Requests\PhieuNhapCreateRequest;
class PhieuNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function danhSach()
    {
        $lst_phieu_nhap = PhieuNhap::paginate(5);
        return view('hoa-don/phieu-nhap/danh-sach',compact('lst_phieu_nhap'));
    }
    public function chiTietPhieuNhap($id)
    {
        $lst_chi_tiet_phieu_nhap = ChiTietPhieuNhap::where('phieu_nhap_id', $id)->paginate(5);

        return view('hoa-don/phieu-nhap/chi_tiet_phieu_nhap',compact('lst_chi_tiet_phieu_nhap'));
    }
    public function themMoi()
    {
        $lst_nha_cung_cap = NhaCungCap::all();
        return view('hoa-don/phieu-nhap/them-moi-phieu-nhap',compact('lst_nha_cung_cap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function xuLyThemMoi(PhieuNhapCreateRequest $request)
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
        $lst_nha_san_xuat = NhaSanXuat::all();
        $lst_dung_luong = DungLuong::all();
        $lst_mau_sac = MauSac::all();
        $lst_dien_thoai = DienThoai::all();
        return view('hoa-don/phieu-nhap/them-moi-dien-thoai',compact('lst_nha_san_xuat','lst_dung_luong','lst_mau_sac','lst_dien_thoai'));
    }
    public function xuLyThemMoiDienThoai(Request $request)
    {
        // dd($request->dung_luong_id);
        $phieu_nhap=PhieuNhap::latest('id')->first();
        // dd($phieu_nhap->id);
        // dd($request);
        $tong_tien=0;
        for($i=0;$i<count($request->dien_thoai_id);$i++){
            $chi_tiet_dien_thoai=ChiTietDienThoai::where('dien_thoai_id',$request->dien_thoai_id[$i])->where('mau_sac_id',$request->mau_sac_id[$i])->where('dung_luong_id',$request->dung_luong_id[$i])->first();
            // dd($chi_tiet_dien_thoai);
            // dd($request->so_luong[$i]);
            $soluong=$request->so_luong[$i];
            $chi_tiet_dien_thoai->so_luong=$chi_tiet_dien_thoai->so_luong+$soluong;
            $chi_tiet_dien_thoai->gia_ban=$request->gia_ban[$i];
            $chi_tiet_dien_thoai->save();

            $chi_tiet_phieu_nhap=new ChiTietPhieuNhap();
            $chi_tiet_phieu_nhap->dien_thoai_id=$request->dien_thoai_id[$i];
            $chi_tiet_phieu_nhap->phieu_nhap_id=$phieu_nhap->id;
            $chi_tiet_phieu_nhap->so_luong=$request->so_luong[$i];
            $chi_tiet_phieu_nhap->gia_nhap=$request->gia_nhap[$i];
            $chi_tiet_phieu_nhap->gia_ban=$request->gia_ban[$i];
            $chi_tiet_phieu_nhap->thanh_tien=$request->so_luong[$i]*$request->gia_nhap[$i];
            $tong_tien+=$chi_tiet_phieu_nhap->thanh_tien;
            $chi_tiet_phieu_nhap->save();
            // $chi_tiet_phieu_nhap->phieu_nhap_id=$request->phieu_nhap_id;
        }
        $phieu_nhap->tong_tien=$tong_tien;
        $phieu_nhap->save();
        return redirect()->route('nha-cung-cap.danh-sach');
    }
    public function danhSachDienThoaiTheoNhaSanXuat(Request $request){
        $dien_thoai = DienThoai::where('nha_san_xuat_id', $request->nha_san_xuat_id)->get();
        return response()->json($dien_thoai);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    //
    public function danhSach(){
        $lst_khachhang = KhachHang::all();
        return view('khachhang/danh-sach', compact('lst_khachhang'));
    }
}

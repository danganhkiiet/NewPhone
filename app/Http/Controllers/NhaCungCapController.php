<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
class NhaCungCapController extends Controller
{
    public function danhSach(){
        $lst_nhacungcap=NhaCungCap::all();

        return view('nhacungcap.danh-sach',compact('lst_nhacungcap'));
    }
}

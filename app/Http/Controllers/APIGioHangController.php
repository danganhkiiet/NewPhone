<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
class APIGioHangController extends Controller
{
    public function themMoi(Request $request){
        $gio_hang=GioHang::create(['khach_hang_id'=>$request->khach_hang_id,'chi_tiet_dien_thoai_id'=>$request->chi_tiet_dien_thoai_id,'so_luong'=>$request->so_luong]);
        return response()->json(
            [
                'success'=>true,
                'status'=>200,
                'messages'=>'Thêm vào giỏ hàng thành công',
            ]
        );
    }

}

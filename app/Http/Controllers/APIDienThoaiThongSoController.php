<?php

namespace App\Http\Controllers;

use App\Models\DienThoaiThongSo;
use Illuminate\Http\Request;
class APIDienThoaiThongSoController extends Controller
{
    public function thongSoTheoDienThoai($id)
    {

        // Lấy danh sách thông số của điện thoại dựa trên ID
        $thongSo = DienThoaiThongSo::with('thongSo')->where('dien_thoai_id', $id)->get();

        // Trả về JSON response chứa danh sách thông số của điện thoại này
        return response()->json([
            'status' => 200,
            'message' => "Danh sách thông số của điện thoại này",
            'data' => $thongSo
        ]);
    }
}

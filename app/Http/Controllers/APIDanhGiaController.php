<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Http\Resources\DanhGiaResource;
use App\Models\ChiTietPhieuXuat;

class APIDanhGiaController extends Controller
{
    public function danhSach(){
        $danh_gia=DanhGia::all();
        if(empty($danh_gia)){
            return $this->apiResource();
        }
        $apidanh_gia=DanhGiaResource::collection($danh_gia);
        return $this->apiResource(true,200,$apidanh_gia,"Danh sách đánh giá");
    }
    public function themMoi(){
        // $danh_gia=DanhGia::create(['khach_hang_id'=>request('khach_hang_id'),'dien_thoai_id'=>request('dien_thoai_id'),'so_sao'=>request(('so_sao')),'mo_ta'=>request('mo_ta')]);
        $danh_gia=DanhGia::where('khach_hang_id',request('khach_hang_id'))->where('dien_thoai_id',Request('dien_thoai_id'))->first();
        if(empty($danh_gia)){
            $danh_gia=DanhGia::create(['khach_hang_id'=>request('khach_hang_id'),'dien_thoai_id'=>request('dien_thoai_id'),'so_sao'=>request(('so_sao')),'mo_ta'=>request('mo_ta')]);
        }
        $danh_gia->so_sao=request('so_sao');
        $danh_gia->mo_ta=request('mo_ta');
        $danh_gia->save();
        $lst_danh_gia=DanhGia::all();

        $apidanh_gia=DanhGiaResource::collection($lst_danh_gia);
        return $this->apiResource(true,200,$apidanh_gia,"Danh sách đã thêm mới đánh giá");
    }
    public function apiResource($success=false,$status=200,$data=null,$messages=null){
        return response()->json([
            'success'=>$success,
            'data'=>$data,
            'status'=>$data==null ? 404 : $status,
            'messages'=> $data==null && $messages==null ?'Không Tìm Thấy Dữ Liệu' : $messages
         ]);
    }
}

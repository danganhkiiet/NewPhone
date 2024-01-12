<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuanCapMot;
use App\Models\BinhLuanCapHai;
use App\Http\Resources\BinhLuanResource;
class APIBinhLuanController extends Controller
{
    public function danhSach(){
        $binh_luan=BinhLuanCapMot::where('dien_thoai_id',request('dien_thoai_id'))->get();
        
        if(empty($binh_luan)){
            return $this->apiResource();
        }
        $apibinh_luan=BinhLuanResource::collection($binh_luan);
        // dd($apibinh_luan);
        return $this->apiResource(true,200,$apibinh_luan,"Danh sách bình luận");
    }
    public function themMoiCapMot(){
        // dd(request());
        $binh_luan=BinhLuanCapMot::create(['khach_hang_id'=>request('khach_hang_id'),'dien_thoai_id'=>request('dien_thoai_id'),'noi_dung'=>request('noi_dung')]);
        if(empty($binh_luan)){
            return $this->apiResource();
        }
        $lst_binh_luan=BinhLuanCapMot::where('dien_thoai_id',request('dien_thoai_id'))->get();

        $apidanh_gia=BinhLuanResource::collection($lst_binh_luan);
        return $this->apiResource(true,200,$apidanh_gia,"Danh sách đã thêm mới bình luận");
    }
    public function themMoiCapHai(){
        $binh_luan=BinhLuanCapHai::create(['binh_luan_cap_mot_id'=>request('binh_luan_cap_mot_id'),'khach_hang_id'=>request('khach_hang_id'),'dien_thoai_id'=>request('dien_thoai_id'),'noi_dung'=>request(('noi_dung'))]);
        if(empty($binh_luan)){
            return $this->apiResource();
        }
        $lst_binh_luan=BinhLuanCapMot::where('dien_thoai_id',request('dien_thoai_id'))->get();

        $apibinh_luan=BinhLuanResource::collection($lst_binh_luan);
        return $this->apiResource(true,200,$apibinh_luan,"Danh sách đã thêm mới bình luận");
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

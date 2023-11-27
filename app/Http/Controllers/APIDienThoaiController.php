<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DienThoai;
use App\Http\Resources\DienThoaiResource;
class APIDienThoaiController extends Controller
{
    //
    public function danhSach(){
        $dien_thoai=DienThoai::all();
        $api_dien_thoai=DienThoaiResource::collection($dien_thoai);
        // $api_dien_thoai=null;
        if($api_dien_thoai){
            return $this->apiResource(true,200,$api_dien_thoai,'Danh Sách Điện Thoại');
        }
        return $this->apiResource();

    }
    public function danhSachChiTiet($id){
        $dien_thoai=DienThoai::find($id);
        $api_dien_thoai=new DienThoaiResource($dien_thoai);
        // $api_dien_thoai=null;
        if($api_dien_thoai){
            return $this->apiResource(true,200,$api_dien_thoai,'Danh Sách Chi Tiết Điện Thoại');
        }
        return $this->apiResource();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DungLuong;
use App\Http\Resources\DungLuongResource;
class APIDungLuongController extends Controller
{
    public function danhSach(){
        $dung_luong=DungLuong::all();
        if(empty($dung_luong)){
            return $this->apiResource();
        }
        $apidung_luong=DungLuongResource::collection($dung_luong);
        return $this->apiResource(true,200,$apidung_luong,"Danh sách màu sắc");
    }
    public function apiResource($success=false,$status=200,$data=null,$messages=null){
        return response()->json([
            'success'=>$success,
            'data'=>$data,
            'status'=>$data==null ? 404 : $status,
            'messages'=> $data==null && $messages==null ?'Không Tìm Thấy Dữ Liệu' : $messages
         ]);
    }
    public function dangKy(){
        return response()->json([
            'messages'=>'thông báo'
        ]);
    }
}

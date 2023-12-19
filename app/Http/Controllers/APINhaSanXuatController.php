<?php

namespace App\Http\Controllers;

use App\Http\Resources\NhaSanXuatResource;
use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use App\Http\Resources\MauResource;
class APINhaSanXuatController extends Controller
{

   public function danhSach(){
        $nha_san_xuat=NhaSanXuat::all();
        if(empty($nha_san_xuat)){
            return $this->apiResource();
        }
        $apinha_san_xuat=NhaSanXuatResource::collection($nha_san_xuat);
        return $this->apiResource(true,200,$apinha_san_xuat,"Danh sách nhà sản xuất");
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

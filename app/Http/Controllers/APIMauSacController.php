<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MauSac;
use App\Http\Resources\MauResource;
class APIMauSacController extends Controller
{
    public function danhSach(){
        $mau_sac=MauSac::all();
        if(empty($mau_sac)){
            return $this->apiResource();
        }
        $apimau_sac=MauResource::collection($mau_sac);
        return $this->apiResource(true,200,$apimau_sac,"Danh sách màu sắc");
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

<?php

namespace App\Http\Controllers;

use App\Http\Resources\RamResource;
use App\Models\Ram;
use Illuminate\Http\Request;

class APIRamController extends Controller
{
    public function danhSach(){
        $ram=Ram::all();
        if(empty($ram)){
            return $this->apiResource();
        }
        $apiram=RamResource::collection($ram);
        return $this->apiResource(true,200,$apiram,"Danh sách ram");
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Resources\BannerResource;
class APIBannerController extends Controller
{
    public function danhSach(){
        $banner=Banner::all();
        if(empty($banner)){
            return $this->apiResource();
        }
        $apibanner=BannerResource::collection($banner);
        return $this->apiResource(true,200,$apibanner,"Danh sách Banner");
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

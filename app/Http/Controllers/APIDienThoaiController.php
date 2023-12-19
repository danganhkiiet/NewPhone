<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DienThoai;
use App\Models\ChiTietDienThoai;
use App\Http\Resources\DienThoaiResource;
use App\Http\Resources\ChiTietDienThoaiResource;
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
    public function danhSachLoc(Request $request){
        // Lấy các giá trị từ request
        $filters = $request->input('filters');

        $query = ChiTietDienThoai::query();

  
        if(isset($filters['gia_ban'])){
          $query->where('gia_ban', '>=', $filters['gia_ban']['gia_dau'])
          ->where('gia_ban', '<=', $filters['gia_ban']['gia_cuoi']);   
        }
        // Kiểm tra và thêm điều kiện về mau_sac
        if (isset($filters['mau_sac'])) {
            $mau_sac_values = $filters['mau_sac'];
           // Sử dụng Closure để quản lý điều kiện liên quan đến 'mau_sac'
           //lý do sử dụng closure giúp định rõ phạm vi và sự tương tác giữa các điều kiện.
            $query->where(function ($query) use ($mau_sac_values) {
                foreach ($mau_sac_values as $mau) {
                    // Kiểm tra sự tồn tại của 'mau_sac_id' trong mỗi điều kiện
                    if (isset($mau['mau_sac_id'])) {
                        $query->orWhere('mau_sac_id', $mau['mau_sac_id']);
                    }
                }
            });
        }

        // Kiểm tra và thêm điều kiện về dung_luong
        if (isset($filters['dung_luong'])) {
            $dung_luong_values = $filters['dung_luong'];
            $query->where(function ($query) use ($dung_luong_values) {
                foreach ($dung_luong_values as $dung_luong) {
                    // Kiểm tra sự tồn tại của 'dung_luong_id' trong mỗi điều kiện
                    if (isset($dung_luong['dung_luong_id'])) {
                        $query->orWhere('dung_luong_id', $dung_luong['dung_luong_id']);
                    }
                }
            });
        }
        if(isset($filters['nha_san_xuat'])){

            $nha_san_xuat = collect($filters['nha_san_xuat'])->values(); // Lấy giá trị của mảng
            // dd($nha_san_xuat);
            // Sử dụng whereIn để thêm điều kiện về nha_san_xuat_id từ bảng DienThoai
            $query->whereIn('dien_thoai_id', function ($query) use ($nha_san_xuat) {
                 // Trong Closure này, chúng ta đang tạo một câu truy vấn con
                $query->select('id')->from('dien_thoai')->whereIn('nha_san_xuat_id', $nha_san_xuat);
            });
            
        }
        

        $filteredProductsType = $query->get();
    //   dd($filteredProductsType);
        $api_dien_thoai_theo_gia=ChiTietDienThoaiResource::collection($filteredProductsType);
        // $api_dien_thoai=null;
        if($api_dien_thoai_theo_gia){
            return $this->apiResource(true,200,$api_dien_thoai_theo_gia,'Danh Sách Điện Thoại Lọc');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use Yajra\DataTables\DataTables;
use App\Http\Requests\NhaSanXuatRequest;
class NhaSanXuatController extends Controller
{
    public function danhSach(Request $request){
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if($request->ajax()){
            $nha_san_xuat=NhaSanXuat::all();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($nha_san_xuat)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                //Thêm cột action cho từng bản
                ->addColumn('Action',function($row){
                    $temp=
                    '<button type="button" class="btn btn-primary btn-edit"
                        ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                            <i class="fe fe-edit"></i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('nha-san-xuat.danh-sach');
    }
    public function capNhat($id){
        $nha_san_xuat = NhaSanXuat::find($id);
        return $nha_san_xuat;
    }
    public function themMoiVaCapNhat(NhaSanXuatRequest $request){
        
        $nha_san_xuat = NhaSanXuat::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
        return response()->json(['message' => 'Thành công']);
    }
}

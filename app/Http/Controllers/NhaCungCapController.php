<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use Yajra\DataTables\DataTables;
use App\Http\Requests\NhaCungCapRequest;
class NhaCungCapController extends Controller
{
    public function danhSach(Request $request){
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if($request->ajax()){
            $nha_cung_cap=NhaCungCap::all();
            // dd($nha_cung_cap);
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($nha_cung_cap)
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
        return view('nha-cung-cap.danh-sach');
    }
    public function capNhat($id){
        $nha_cung_cap = NhaCungCap::find($id);
        return $nha_cung_cap;
    }
    public function themMoiVaCapNhat(NhaCungCapRequest $request){
        
        $nha_cung_cap = NhaCungCap::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten,'dia_chi'=>$request->dia_chi,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
        return response()->json(['message' => 'Thành công']);
    }
    
}

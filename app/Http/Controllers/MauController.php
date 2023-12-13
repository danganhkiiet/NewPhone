<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MauSac;
use Yajra\DataTables\DataTables;
use App\Http\Requests\MauSacDungLuongThongSoRequest;
class MauController extends Controller
{
    //
    public function danhSach(Request $request){
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if($request->ajax()){
            $mau_sac=MauSac::all();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($mau_sac)
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
        return view('san-pham.mau-sac.danh-sach');
    }
    public function capNhat($id){
        $mau_sac = MauSac::find($id);
        return $mau_sac;
    }
    public function themMoiVaCapNhat(MauSacDungLuongThongSoRequest $request){
        
        $mau_sac = MauSac::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten]);
        return response()->json(['message' => 'Thành công']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\MauSacDungLuongThongSoRequest;
use App\Models\Ram;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RamController extends Controller
{
    public function danhSach(Request $request){
        if($request->ajax()){
            $ram=Ram::all();

            return DataTables::of($ram)
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
        return view('san-pham.ram.danh-sach');
    }
    public function capNhat($id){
        $ram = Ram::find($id);
        return $ram;
    }
    public function themMoiVaCapNhat(MauSacDungLuongThongSoRequest $request){
        
        $ram = Ram::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten]);
        return response()->json(['message' => 'Thành công']);
    }
    public function xoa($id){
        $ram = Ram::find($id);
        
        $ram->delete();
        return redirect()->route('ram.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

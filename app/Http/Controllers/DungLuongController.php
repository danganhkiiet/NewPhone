<?php

namespace App\Http\Controllers;

use App\Models\DungLuong;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\MauSacDungLuongThongSoRequest;
class DungLuongController extends Controller
{
    public function danhSach(Request $request){
        if($request->ajax()){
            $dung_luong=DungLuong::all();

            return DataTables::of($dung_luong)
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
        return view('san-pham.dung-luong.danh-sach');
    }
    public function capNhat($id){
        $dung_luong = DungLuong::find($id);
        return $dung_luong;
    }
    public function themMoiVaCapNhat(MauSacDungLuongThongSoRequest $request){
        
        $dung_luong = DungLuong::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten]);
        return response()->json(['message' => 'Thành công']);
    }
    public function xoa($id){
        $dluong = DungLuong::find($id);
        
        $dluong->delete();
        return redirect()->route('dung-luong.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

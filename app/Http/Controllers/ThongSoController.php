<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongSo;
use Yajra\DataTables\DataTables;
use App\Http\Requests\MauSacDungLuongThongSoRequest;
class ThongSoController extends Controller
{
    public function danhSach(Request $request){
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if($request->ajax()){
            $thong_so=ThongSo::all();
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($thong_so)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                //Thêm cột action cho từng bản
                ->addColumn('Action',function($row){
                    $temp=
                    '<button type="button" class="btn btn-primary btn-edit"
                        ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                            <i class="fe fe-edit"></i>
                    </button>';
                    $temp=$temp.
                    '<button type="button" class="btn btn-danger fs-14 text-white delete-icn btn-delete"
                        ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                            <i class="fe fe-delete"></i>
                    </button>';
                    return $temp;
                })
                //DataTables sẽ không trích xuất văn bản trong cột "Action" mà sẽ hiển thị toàn bộ mã trên tao đã viét.
                ->rawColumns(['Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('san-pham.thong-so.danh-sach');
    }
    public function capNhat($id){
        $thong_so = ThongSo::find($id);
        return $thong_so;
    }
    public function themMoiVaCapNhat(MauSacDungLuongThongSoRequest $request){
        $thong_so = ThongSo::updateOrCreate(['id'=>$request->id],['ten'=>$request->ten]);
        return response()->json(['message' => 'Thành công']);
    }
    public function themMoi(Request $request){
        $thong_so = ThongSo::create(['ten'=>$request->ten]);
        return response()->json(['thong_bao'=>'Thêm mới thành công']);
    }
     public function xoa($id){
        $thong_so = ThongSo::find($id);
        $thong_so->delete();
        return redirect()->route('thong-so.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

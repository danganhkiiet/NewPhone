<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function danhSach(Request $request)
    {
        //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
        if ($request->ajax()) {
            $banner = Banner::all();
            // dd($nha_cung_cap);
            //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
            return DataTables::of($banner)
                //Thêm một cột số thứ tự cho từng bản ghi
                ->addIndexColumn()
                //Thêm cột banner cho từng bản
                ->addColumn('duong_dan', function ($row) {
                    return '<img src="' . asset("{$row->duong_dan}") . '"  style="width: 100%;height: 15em;">';
                })
                //Thêm cột action cho từng bản
                ->addColumn('Action', function ($row) {
                    $temp =
                        '<button type="button" class="btn btn-primary btn-edit"
                        ata-toggle="modal" data-target="#myModal" data-id="' . $row->id . '">
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
                ->rawColumns(['duong_dan', 'Action'])
                //Tạo và trả về JSON để hiển thị trong DataTable
                ->make(true);
        }
        return view('banner.danh-sach');
    }
    public function capNhat($id)
    {
        $banner = Banner::find($id);
        $banner['duong_dan']=asset($banner['duong_dan']);
        return $banner;
    }
    public function themMoiVaCapNhat(Request $request)
    {
        if(empty($request->hinh_anh)){
            $banner = Banner::updateOrCreate(['id' => $request->id], ['ten' => $request->ten]);
            return response()->json(['message' => 'Thành công']);
        }
        $file = $request->hinh_anh;
        $path = $file->store('banner');
        $banner = Banner::updateOrCreate(['id' => $request->id], ['ten' => $request->ten, 'duong_dan' => $path]);
        return response()->json(['message' => 'Thành công']);
    }
    public function xoa($id){
        $banner = Banner::find($id);
        $banner->delete();
        return response()->json(['message' => 'Xóa Thành công']);
    }
}

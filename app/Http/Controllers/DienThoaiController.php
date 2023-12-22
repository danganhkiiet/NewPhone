<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\Models\ChiTietDienThoai;
use App\Models\DienThoaiThongSo;
use App\Models\HinhAnh;
use App\Models\ThongSo;
use App\Models\MauSac;
use App\Models\DienThoai;
use App\Models\DungLuong;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;
class DienThoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function capNhatMoTa(Request $request, $id)
    {
        $dien_thoai = DienThoai::find($id);
        $dien_thoai->mo_ta=$request->mo_ta;
        $dien_thoai->save();
        return redirect()->back();
    }
    public function themMoi()
    {
        $lst_thong_so = ThongSo::all();
        $lst_dung_luong = DungLuong::all();
        $lst_mau_sac = MauSac::all();
        $lst_nha_san_xuat = NhaSanXuat::all();
        return view('san-pham/dien-thoai/them-moi',compact('lst_thong_so','lst_dung_luong','lst_mau_sac','lst_nha_san_xuat'));
    }
    public function xuLyThemMoi(Request $request)
    {
        // dd($request);
        //them dien thoai moi
        $dien_thoai = new DienThoai();
        $dien_thoai->ten = $request->ten;
        $dien_thoai->nha_san_xuat_id= $request->nha_san_xuat_id;
        $dien_thoai->save();
       
        // thêm hình ảnh sản phẩm
        $files = $request->hinh_anh;
        $paths=[];
        foreach ($files as $file){
            $hinh_anh = new HinhAnh();
            $hinh_anh->dien_thoai_id = $dien_thoai->id;
            $path= $file->store('hinh_anh');
            $hinh_anh->duong_dan=$path;
            $paths[]=$path;
            $hinh_anh->save();
        }
        //duyệt bảng để thêm
        for($i = 0; $i < count($request->thong_so_id); $i = $i +1 )
        {
            // tao chi tiet dien thoai moi
            if(!empty($request->dung_luong_id[$i]))
            {
                $chi_tiet_dien_thoai = new ChiTietDienThoai();
                $chi_tiet_dien_thoai->dien_thoai_id = $dien_thoai->id;
                $chi_tiet_dien_thoai->mau_sac_id = $request->mau_sac_id[$i];
                $chi_tiet_dien_thoai->dung_luong_id = $request->dung_luong_id[$i];
                $chi_tiet_dien_thoai->so_luong = 0;
                $chi_tiet_dien_thoai->gia_ban = 0;
                $chi_tiet_dien_thoai -> save();
            }
            //tao dien thoai thong so
            $dien_thoai_thong_so = new DienThoaiThongSo();
            $dien_thoai_thong_so -> dien_thoai_id = $dien_thoai->id;
            $dien_thoai_thong_so -> thong_so_id = $request->thong_so_id[$i];
            $dien_thoai_thong_so -> gia_tri = $request->gia_tri[$i];
            $dien_thoai_thong_so -> save();
        }
        return redirect()->route('dien-thoai.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function themHinhAnh(Request $request)
    {
        //lay id san pham
        $id = $request->input('id');
        
        //kiem tra rq co ảnh không
        if($request->hasFile('images')) {
            // thêm hình ảnh sản phẩm
            $paths=[];
            foreach ($request->file('images') as $image) {
                $hinh_anh = new HinhAnh();
                $hinh_anh->dien_thoai_id = $id;
                $path = $image->store('hinh_anh');
                $hinh_anh->duong_dan=$path;
                $paths[]=$path;
                $hinh_anh->save();
            }
            $lst_hinh_anh = HinhAnh::where('dien_thoai_id', $id)->get();
            return response()->json(['message' => 'Thêm ảnh thành công', 'lst_hinh_anh' => $lst_hinh_anh]);
        }
    }
    public function xoaHinhAnh(Request $request)
    {
        $hinh_anh = HinhAnh::find($request->id);
        $hinh_anh->delete();
        $lst_hinh_anh = HinhAnh::where('dien_thoai_id', $request->id_dien_thoai)->get();
        return response()->json(['message' => 'Thêm ảnh thành công', 'lst_hinh_anh' => $lst_hinh_anh]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function danhSach(Request $request)
    {
        if($request->ajax())
        {
            $lst_dien_thoai = DienThoai::all();
            return datatables::of($lst_dien_thoai)
            ->addColumn('nha_san_xuat_id', function($row) {
                return $row->nha_san_xuat->ten; 
            })
            ->addColumn('Action',function($row){
                $col = '
                    <a href="'.route('dien-thoai.xem-chi-tiet', ['id' => $row->id]).'">
                        <button type="button" class="btn btn-primary btn-edit"  >
                            <i class="fe fe-info"></i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-danger fs-14 text-white delete-icn btn-delete"
                    ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                        <i class="fe fe-delete"></i>
                    </button>';
                return $col;
            })
            ->rawColumns(['Action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('san-pham/dien-thoai/danh-sach');
    }
    public function danhSachDaXoa(Request $request)
    {
        if($request->ajax())
        {
            $lst_dien_thoai_da_xoa = DienThoai::onlyTrashed()->get();
        
            return datatables::of($lst_dien_thoai_da_xoa)
                ->addColumn('nha_san_xuat_id', function($row) {
                    return $row->nha_san_xuat->ten; 
                })
                ->addColumn('Action',function($row){
                    $col = '
                    <button type="button" class="btn btn-success fs-14 text-white delete-icn btn-restore"
                    ata-toggle="modal" data-target="#myModal" data-id="'. $row->id .'">
                        <i class="fa fa-rotate-left"></i>
                    </button>'
                    ;
                return $col;
                })
                ->rawColumns(['Action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('san-pham/dien-thoai/danh-sach-da-xoa   ');
    }
    public function chiTietDienThoai(Request $request, $id)
    {
        
        if($request->ajax())
        {
            $lst_chi_tiet_dien_thoai = ChiTietDienThoai::where('dien_thoai_id',$id)->get();
            return datatables::of($lst_chi_tiet_dien_thoai)
                ->addColumn('dien_thoai_id', function($row) {
                    return $row->dienThoai->ten; 
                })
                ->addColumn('mau_sac_id', function($row) {
                    return $row->mauSac->ten; 
                })
                ->addColumn('dung_luong_id', function($row) {
                    return $row->dungLuong->ten; 
                })
                ->addIndexColumn()
                ->make(true);
        }
        $lst_hinh_anh = HinhAnh::where('dien_thoai_id',$id)->get();
        $dien_thoai = DienThoai::find($id);
        return view('san-pham/dien-thoai/chi-tiet',compact('lst_hinh_anh','dien_thoai'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function capNhat($id)
    {
        $lst_chi_tiet_dien_thoai = ChiTietDienThoai::where('dien_thoai_id',$id)->get();
        return view('san-pham/dien-thoai/cap-nhat',compact('lst_chi_tiet_dien_thoai'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $chi_tiet_dien_thoai = ChiTietDienThoai::find($id);
        $dien_thoai = DienThoai::find($chi_tiet_dien_thoai -> dien_thoai_id);
        
        $dien_thoai->mo_ta = $request->mo_ta;
        $dien_thoai->ten = $request->ten;
        $chi_tiet_dien_thoai->gia_ban = $request->gia_ban;

        $dien_thoai->save();
        $chi_tiet_dien_thoai->save();
        return ('thanh cong roi');
    }

    public function xoa(string $id)
    {
        $dien_thoai = DienThoai::find($id);
        $dien_thoai->delete();
        return redirect()->route('dien-thoai.danh-sach');
    }
    public function restore(string $id)
    {
        $dien_thoai = DienThoai::onlyTrashed()->where('id',$id)->first();
      
        if(!empty($dien_thoai))
        {
            $dien_thoai->restore();
            return redirect()->route('dien-thoai.danh-sach-da-xoa');
        }        
    }
   

    public function kiemTraTonTai(Request $request)
    {
        $ten = $request->ten;
        $tontai = DienThoai::withTrashed()->where('ten', $ten)->first();
        if ($tontai) {
            return response()->json(['flag' => true], 200);
        }
        return response()->json(['flag' => false], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

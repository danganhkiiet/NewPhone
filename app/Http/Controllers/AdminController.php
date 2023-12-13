<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\DangNhapRequest;
class AdminController extends Controller
{
    public function dangNhap(){
       return view('login');
    }
    public function xuLyDangNhap(DangNhapRequest $request){
        $admin=Admin::where('email',$request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->route('dien-thoai.danh-sach');
                }
            }
        }
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng nhập thất bại');
    }
    public function dangXuat(){
        $admin=Auth::logout();
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng xuất thành công');
    }
    public function danhSach(Request $request){
        if(Gate::check('is-admin')){
            //Kiểm tra xem yêu cầu hiện tại có phải là một yêu cầu Ajax không
            if($request->ajax()){
                $admin=Admin::all();
                // dd($admin);
                //Sử dụng DataTables để xử lý và trả về dữ liệu dưới dạng JSON cho DataTable
                return DataTables::of($admin)
                    //Thêm một cột số thứ tự cho từng bản ghi
                    ->addIndexColumn()
                    //Thêm cột avatar cho từng bản
                    ->addColumn('avatar', function ($row) {
                        return '<img src="'.asset("{$row->avatar}").'"  width="50" height="50">';
                    })
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
                    ->rawColumns(['avatar','Action'])
                    //Tạo và trả về JSON để hiển thị trong DataTable
                    ->make(true);
            }
            return view('tai-khoan.quan-tri-vien.danh-sach');
        }
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>'bạn không được truy cập tới danh sách quản trị viên']);
       
    }
    public function themMoi(AdminCreateRequest $request){
        $is_admin = $request->has('is_admin') ? 1 : 0;

        if($is_admin==1){{
            $file=$request->avatar;
        
            $path=$file->store('avatar');
            $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
            return response()->json(['message' => 'Thành công']);
          
        }}
        else{

            $file=$request->avatar;
            $path=$file->store('avatar');
            $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
            return response()->json(['message' => 'Thành công']);
        }
    }
    public function capNhat($id){
        $admin = Admin::find($id);
        return $admin;
    }
    public function xuLyCapNhat(AdminUpdateRequest $request){
        //   dd($request);
        $is_admin = $request->has('is_admin') ? 1 : 0;

        if($is_admin==1){{
         
                if(empty($request->avatar)){
                    if(empty($request->password)){
                        $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'is_admin'=>$is_admin]);
                        return response()->json(['message'=>'Cập Nhật Thành Công']);
                    }
                    $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'is_admin'=>$is_admin]);
                    return response()->json(['message'=>'Cập Nhật Thành Công']);
                }
        
              
                if(empty($request->password)){
        
                    $file=$request->avatar;
        
                    $path=$file->store('avatar');
                    
                    $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
                    return response()->json(['message'=>'Cập Nhật Thành Công']);
                }
        
                $file=$request->avatar;
        
                $path=$file->store('avatar');
                $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
                return response()->json(['message' => 'Thành công']);
        }}
        else{

                if(empty($request->avatar)){
                    if(empty($request->password)){
                        $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'is_admin'=>$is_admin]);
                        return response()->json(['message'=>'Cập Nhật Thành Công']);
                    }
                    $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'is_admin'=>$is_admin]);
                    return response()->json(['message'=>'Cập Nhật Thành Công']);
                }
              
                if(empty($request->password)){
        
                    $file=$request->avatar;
        
                    $path=$file->store('avatar');
                    
                    $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
                    return response()->json(['message'=>'Cập Nhật Thành Công']);
                }
        
                $file=$request->avatar;
        
                $path=$file->store('avatar');
                $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path,'is_admin'=>$is_admin]);
        
                return response()->json(['message' => 'Thành công']);
            
        }
   
    }
    public function xoa($id){
        $admin = Admin::find($id);
        $admin->delete();
        return response()->json(['message' => 'Xóa Thành công']);
    }
    public function thongTinCaNhanQuanTriVien($id){
        $admin=Admin::find($id);

        return view('tai-khoan.quan-tri-vien.thong-tin-ca-nhan-quan-tri-vien',compact('admin'));
    }
    public function capNhatThongTinCaNhanQuanTriVien(Request $request,$id){

        if(empty($request->avatar)){
            if(empty($request->password)){
                $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
                return redirect()->route('quan-tri-vien.thong-tin-ca-nhan',$id)->with(['thong_bao'=>'Cập nhật thành công']);
            }
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
            return redirect()->route('quan-tri-vien.thong-tin-ca-nhan',$id)->with(['thong_bao'=>'Cập nhật thành công']);
        }

         //   dd($request);
        if(empty($request->password)){

            $file=$request->avatar;

            $path=$file->store('avatar');
            
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);

            return redirect()->route('quan-tri-vien.thong-tin-ca-nhan',$id)->with(['thong_bao'=>'Cập nhật thành công']);
        }

        $file=$request->avatar;

        $path=$file->store('avatar');

        $admin = Admin::update(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);

    
        
        return redirect()->route('quan-tri-vien.thong-tin-ca-nhan',$id)->with(['thong_bao'=>'Cập nhật thành công']);
    }
}

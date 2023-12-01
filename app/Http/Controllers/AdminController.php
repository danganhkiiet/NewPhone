<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Yajra\DataTables\DataTables;
class AdminController extends Controller
{
    public function dangNhap(){
       return view('login');
    }
    public function xuLyDangNhap(Request $request){
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
    // public function danhSach(){
    //     $lst_admin=Admin::paginate(5);

    //     // if($ten = request()->ten)
    //     // {
    //     //     $lst_nhacungcap=NhaCungCap::where('ten','like','%'.$ten)->paginate(5);
    //     // }
    //     return view('tai-khoan.quan-tri-vien.danh-sach',compact('lst_admin'));
    // }
    // public function themMoi(Request $request){
    //     $admin = new Admin();
    //     $admin->ho_ten = $request->ho_ten;
    //     $admin->email=$request->email;
    //     $admin->password=Hash::make($request->password);
    //     $admin->so_dien_thoai=$request->so_dien_thoai;
    //     // dd($request);
    //     $file=$request->avatar_hinh;
    //     $path=$file->store('avatar');
    //     $admin->avatar=$path;
    //     $admin->save();
    //     return response()->json(['message'=>'Thêm Thành Công']);
    // }
    // public function capNhat($id){
    //     $admin=Admin::find($id);
    //     return $admin;
    // }
    // public function xuLyCapNhat(Request $request)
    // {
    //     // dd($request);
    //     if(empty($request->avatar_hinh)){
    //         if(empty($request->password)){
    //             $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
    //             return response()->json(['message'=>'Cập Nhật Thành Công']);
    //         }
    //         $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
    //         return response()->json(['message'=>'Cập Nhật Thành Công']);
    //     }

      
    //     if(empty($request->password)){

    //         $file=$request->avatar_hinh;

    //         $path=$file->store('avatar');
            
    //         $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);

    //         return response()->json(['message'=>'Cập Nhật Thành Công']);
    //     }

    //     $file=$request->avatar_hinh;

    //     $path=$file->store('avatar');

    //     $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
        
    //     return response()->json(['message'=>'Cập Nhật Thành Công']);
    // }
    // public function xoa($id){
    //     $admin=Admin::find($id);
       
    //     if(empty($admin)){
    //         return "xóa thất bại";
    //     }
    //     $admin->delete();
    //     return redirect()->route('quan-tri-vien.danh-sach')->with('thong_bao','Xóa thành công');
    // }
    public function danhSach(Request $request){
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
    public function capNhat($id){
        $admin = Admin::find($id);
        return $admin;
    }
    public function themMoiVaCapNhat(Request $request){

        if(empty($request->id)){

            $request->validate([
                'ho_ten' => 'required',
                'email' => 'email|required',
                'password' => 'required',
                'so_dien_thoai' => 'numeric|required|min:10',
            ],[
                'ho_ten.required' => 'Họ tên không được bỏ trống.',
                'email.email' => 'Email không hợp lệ.',
                'email.required' => 'Email không được bỏ trống.',
                'password.required' => 'Mật khẩu không được bỏ trống.',
                'so_dien_thoai.numeric' => 'Số điện thoại phải là số.',
                'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống.',
                'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            ]);

            $file=$request->avatar;
    
            $path=$file->store('avatar');
            $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);
    
            return response()->json(['message' => 'Thành công']);
        }
        else{

            $request->validate([
                'ho_ten' => 'required',
                'email' => 'email|required',
                'so_dien_thoai' => 'numeric|required|min:10',
            ], [
                'ho_ten.required' => 'Họ tên không được bỏ trống.',
                'email.email' => 'Email không hợp lệ.',
                'email.required' => 'Email không được bỏ trống.',
                'so_dien_thoai.numeric' => 'Số điện thoại phải là số.',
                'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống.',
                'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            ]);
            if(empty($request->avatar)){
                if(empty($request->password)){
                    $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
                    return response()->json(['message'=>'Cập Nhật Thành Công']);
                }
                $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
                return response()->json(['message'=>'Cập Nhật Thành Công']);
            }
    
          
            if(empty($request->password)){
    
                $file=$request->avatar;
    
                $path=$file->store('avatar');
                
                $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);
    
                return response()->json(['message'=>'Cập Nhật Thành Công']);
            }
    
            $file=$request->avatar;
    
            $path=$file->store('avatar');
            $admin = Admin::updateOrCreate(['id'=>$request->id],['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);
    
            return response()->json(['message' => 'Thành công']);
        }
   
    }
    public function xoa($id){
        $admin = Admin::find($id);
        $admin->delete();
        return response()->json(['message' => 'Xóa Thành công']);
    }
}

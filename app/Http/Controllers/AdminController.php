<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminController extends Controller
{
    public function dangNhap(){
       return view('login');
    }
    public function xuLyDangNhap(Request $request){
        $admin=Admin::where('email',$request->email)->first();

        if(Hash::check($request->password, $admin->password)){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('dien-thoai.danh-sach');
            }
        }
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng nhập thất bại');
    }
    public function dangXuat(){
        $admin=Auth::logout();
        
        return redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng xuất thành công');
    }
    public function danhSach(){
        $lst_admin=Admin::paginate(5);

        // if($ten = request()->ten)
        // {
        //     $lst_nhacungcap=NhaCungCap::where('ten','like','%'.$ten)->paginate(5);
        // }
        return view('tai-khoan.quan-tri-vien.danh-sach',compact('lst_admin'));
    }
    public function themMoi(){
        return view('tai-khoan.quan-tri-vien.them-moi');
    }
    public function xuLyThemMoi(Request $request)
    {
        // dd($request);
        $file=$request->avatar;
        $path=$file->store('avatar');

        $admin=Admin::create(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);

        return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    public function capNhat($id){
        $admin=Admin::find($id);
        return view('tai-khoan.quan-tri-vien.cap-nhat',compact('admin'));
    }
    public function xuLyCapNhat(Request $request,$id)
    {
        // dd($request);
        if(empty($request->avatar)){
            if(empty($request->password)){
                $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
                return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Cập nhật thành công');
            }
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
            return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Cập nhật thành công');
        }

      
        if(empty($request->password)){

            $file=$request->avatar;

            $path=$file->store('avatar');
            
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);

            return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Cập nhật thành công');
        }

        $file=$request->avatar;

        $path=$file->store('avatar');

        $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai,'avatar'=>$path]);
        
        return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
    public function xoa($id){
        $admin=Admin::find($id);
       
        if(empty($admin)){
            return "xóa thất bại";
        }
        $admin->delete();
        return redirect()->route('tai-khoan.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

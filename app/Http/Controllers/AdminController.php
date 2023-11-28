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
    public function danhSach(){
        $lst_admin=Admin::paginate(5);

        // if($ten = request()->ten)
        // {
        //     $lst_nhacungcap=NhaCungCap::where('ten','like','%'.$ten)->paginate(5);
        // }
        return view('tai-khoan.quan-tri-vien.danh-sach',compact('lst_admin'));
    }
    public function themMoi(Request $request){
        $admin = new Admin();
        $admin->ho_ten = $request->ten;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->so_dien_thoai=$request->so_dien_thoai;
        // dd($request);
        // $file=$request->avatar_hinh;
        // $path=$file->store('avatar');
        $admin->avatar='123';
        $admin->save();
        return response()->json(['message'=>'Thêm Thành Công']);
    }
    public function capNhat($id){
        $admin=Admin::find($id);
        return $admin;
    }
    public function xuLyCapNhat(Request $request)
    {
        // dd($request);
        // if(empty($request->avatar)){
            if(empty($request->password)){
                $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);
                return response()->json(['message'=>'Cập Nhật Thành Công']);
            }
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
            return response()->json(['message'=>'Cập Nhật Thành Công']);
        //}

      
        if(empty($request->password)){

            // $file=$request->avatar;

            // $path=$file->store('avatar');
            
            $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'so_dien_thoai'=>$request->so_dien_thoai]);

            return response()->json(['message'=>'Cập Nhật Thành Công']);
        }

        // $file=$request->avatar;

        // $path=$file->store('avatar');

        $admin=Admin::where('id',$request->id)->update(['ho_ten'=>$request->ho_ten,'email'=>$request->email,'password'=>Hash::make($request->password),'so_dien_thoai'=>$request->so_dien_thoai]);
        
        return response()->json(['message'=>'Cập Nhật Thành Công']);
    }
    public function xoa($id){
        $admin=Admin::find($id);
       
        if(empty($admin)){
            return "xóa thất bại";
        }
        $admin->delete();
        return redirect()->route('quan-tri-vien.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

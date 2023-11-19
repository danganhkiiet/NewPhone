<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chipset;
class ChipsetController extends Controller
{
    //
    public function danhSach(){
        $lst_chipset = Chipset::paginate(5);
        if($ten = request()->ten)
        {
            $lst_chipset = Chipset::where('ten','like','%'.$ten)->paginate(5);
        }
        return view('thong-so-dien-thoai/chipset/danh-sach', compact('lst_chipset'));
    }
    public function themMoi(){
        return view('thong-so-dien-thoai/chipset/them-moi');
    }
    public function xuLyThemMoi(Request $request){
      $chipset = new Chipset();
      $chipset->ten = $request->ten;
      $chipset->save();
       return redirect()->route('chipset.danh-sach')->with('thong_bao','Thêm mới thành công');
    }
    
    public function capNhat($id){
       $chipset = Chipset::find($id);
        return view('thong-so-dien-thoai/chipset/cap-nhat', compact('chipset'));
    }
    
    public function xuLyCapNhat(Request $request, $id){
       $chipset = Chipset::find($id);
       $chipset->ten = $request->ten;
       $chipset->save();
        return redirect()->route('chipset.danh-sach')->with('thong_bao','Cập nhật thành công');
    }
     public function xoa($id){
       $chipset = Chipset::find($id);
       $chipset->delete();
        return redirect()->route('chipset.danh-sach')->with('thong_bao','Xóa thành công');
    }
}

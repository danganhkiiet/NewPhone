<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class GioHang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="gio_hang";
    protected $fillable=['khach_hang_id','chi_tiet_dien_thoai_id','so_luong'];
    
    public function khach_hang(){
        return $this->belongsTo(KhachHang::class);
    }
    public function chi_tiet_dien_thoai(){
        return $this->belongsTo(ChiTietDienThoai::class);
    }
    
    
}

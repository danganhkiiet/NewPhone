<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YeuThich extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="yeu_thich";
    protected $fillable=['khach_hang_id','chi_tiet_dien_thoai_id'];
    
    public function khach_hang(){
        return $this->belongsTo(KhachHang::class);
    }
    public function chi_tiet_dien_thoai(){
        return $this->belongsTo(ChiTietDienThoai::class);
    }
}

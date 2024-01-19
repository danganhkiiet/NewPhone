<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DanhGia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='danh_gia';
    protected $fillable=['khach_hang_id','dien_thoai_id','so_sao','mo_ta'];
    public function khach_hang(){
        return $this->belongsTo(KhachHang::class);
    }
    public function dien_thoai(){
        return $this->belongsTo(DienThoai::class);
    }
}

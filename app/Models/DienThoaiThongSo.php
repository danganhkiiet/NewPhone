<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienThoaiThongSo extends Model
{
    use HasFactory;
    protected $table='dien_thoai_thong_so';
    public function thongSo()
    {
        return $this->belongsTo(ThongSo::class, 'thong_so_id');
    }
    public function dienThoai()
    {
        return $this->belongsTo(DienThoai::class, 'dien_thoai_id');
    }
}

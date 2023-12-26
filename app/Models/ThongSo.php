<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ThongSo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['ten'];
    protected $table='thong_so';
    public function dienThoaiThongSo()
    {
        return $this->hasMany(DienThoaiThongSo::class, 'thong_so_id');
    }
    public function dienThoai(){
        return $this->belongsToMany(DienThoaiThongSo::class);
    }
}

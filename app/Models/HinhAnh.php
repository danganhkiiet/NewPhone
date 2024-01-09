<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HinhAnh extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="hinh_anh";
    public function dienThoai(){
        return $this->belongsTo(DienThoai::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DungLuong extends Model
{
    use HasFactory;
    protected $table='dung_luong';
    protected $fillable=['ten'];
    public function chiTietDienThoai(){
        return $this->hasMany(ChiTietDienThoai::class);
    }
    protected $hidden=['created_at','updated_at','deleted_at'];
}

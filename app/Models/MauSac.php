<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MauSac extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='mau_sac';
    public $fillable=['ten'];
    public function chiTietDienThoai(){
        return $this->hasMany(ChiTietDienThoai::class);
    }
    protected $hidden=['created_at','updated_at','deleted_at'];
}

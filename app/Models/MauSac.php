<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use HasFactory;
    protected $table='mau_sac';
    public function chiTietDienThoai(){
        return $this->hasMany(ChiTietDienThoai::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    use HasFactory;
    protected $table="nha_san_xuat";


    protected $fillable=['ten','dia_chi','email','so_dien_thoai'];

    protected $hidden=['created_at','updated_at','deleted_at'];
    

    public function dienThoai()
    {
        return $this->hasMany(DienThoai::class);
    }

}

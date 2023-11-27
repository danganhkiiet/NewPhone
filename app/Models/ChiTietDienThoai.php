<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDienThoai extends Model
{
    use HasFactory;
    protected $table="chi_tiet_dien_thoai";

    protected $hidden=['created_at','updated_at','deleted_at'];
}

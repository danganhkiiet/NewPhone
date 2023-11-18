<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $fillable = ['ten', 'dia_chi', 'email', 'so_dien_thoai'];
    protected $table="nha_cung_cap";
}

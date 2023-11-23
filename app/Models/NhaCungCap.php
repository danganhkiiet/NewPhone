<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class NhaCungCap extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['ten', 'dia_chi', 'email', 'so_dien_thoai'];
    protected $table="nha_cung_cap";
    public function phieuNhap()
    {
        return $this->hasMany(PhieuNhap::class);
    }
}

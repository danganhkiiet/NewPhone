<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;
class Admin extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table="admin";
    protected $fillable=['ho_ten','email','password','so_dien_thoai','avatar','is_admin'];
    public function phieuNhap()
    {
        return $this->hasMany(PhieuNhap::class);
    }
}

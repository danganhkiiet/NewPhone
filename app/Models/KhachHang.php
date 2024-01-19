<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class KhachHang extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes;
    protected $table="khach_hang";
    protected $fillable=['ten','dia_chi','email','so_dien_thoai','password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function phieu_xuat(){
        return $this->hasMany(PhieuXuat::class);
    }
}

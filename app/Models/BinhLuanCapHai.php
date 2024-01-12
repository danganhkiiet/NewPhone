<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BinhLuanCapHai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'binh_luan_cap_hai';
    protected $fillable = ['binh_luan_cap_mot_id','khach_hang_id', 'dien_thoai_id', 'noi_dung'];
    public function khach_hang()
    {
        return $this->belongsTo(KhachHang::class);
    }
    public function binh_luan_cap_mot()
    {
        return $this->belongsTo(BinhLuanCapMot::class);
    }
}

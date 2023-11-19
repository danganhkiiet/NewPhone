<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KhangNuoc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['ten'];
    protected $table="khang_nuoc";
}

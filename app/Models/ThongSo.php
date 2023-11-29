<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongSo extends Model
{
    use HasFactory;
    protected $fillable=['ten'];
    protected $table='thong_so';
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dien_thoai', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->integer('dien_thoai_id');
            $table->float('gia_ban');
            $table->integer('so_luong');
            $table->multiLineString('mo_ta');
            $table->integer('mau_id');
            $table->integer('kich_thuoc_mang_hinh_id');
            $table->integer('cong_nghe_mang_hinh_id');
            $table->integer('camera_sau_id');
            $table->integer('camera_truoc_id');
            $table->integer('chipset_id');
            $table->integer('dung_luong_ram_id');
            $table->integer('pin_id');
            $table->integer('bo_nho_trong_id');
            $table->integer('the_sim_id');
            $table->integer('he_dieu_hang_id');
            $table->integer('tinh_nang_mang_hinh_id');
            $table->integer('do_phan_giai_mang_hinh_id');
            $table->integer('cong_sac_id');
            $table->integer('khang_nuoc_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dien_thoai');
    }
};

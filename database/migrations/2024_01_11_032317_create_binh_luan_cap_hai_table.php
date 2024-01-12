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
        Schema::create('binh_luan_cap_hai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('binh_luan_cap_mot_id');
            $table->unsignedBigInteger('dien_thoai_id');
            $table->unsignedBigInteger('khach_hang_id');
            $table->string('noi_dung');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho dien_thoai_id
            $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai');

            // Khai báo khóa ngoại cho phieu_xuat_id
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');

            // Khai báo khóa ngoại cho dien_thoai_id
            $table->foreign('binh_luan_cap_mot_id')->references('id')->on('binh_luan_cap_mot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan_cap_hai');
    }
};

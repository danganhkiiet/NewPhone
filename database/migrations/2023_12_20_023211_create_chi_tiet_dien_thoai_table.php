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
        Schema::create('chi_tiet_dien_thoai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dien_thoai_id');
            $table->unsignedBigInteger('mau_sac_id');
            $table->unsignedBigInteger('dung_luong_id');
            $table->integer('so_luong');
            $table->decimal('gia_ban', 10, 0);
            $table->timestamps();
            $table->softDeletes();

            // // Khai báo khóa ngoại cho dien_thoai_id
            // $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai')->onDelete('cascade');

            $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai');

            // Khai báo khóa ngoại cho mau_sac_id
            $table->foreign('mau_sac_id')->references('id')->on('mau_sac');

            // Khai báo khóa ngoại cho dung_luong_id
            $table->foreign('dung_luong_id')->references('id')->on('dung_luong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_dien_thoai');
    }
};

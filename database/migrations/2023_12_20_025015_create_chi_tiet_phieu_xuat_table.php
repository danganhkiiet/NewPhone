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
        Schema::create('chi_tiet_phieu_xuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dien_thoai_id');
            $table->unsignedBigInteger('phieu_xuat_id');
            $table->integer('so_luong');
            $table->decimal('gia_ban', 10, 0);
            $table->decimal('thanh_tien', 10, 0);
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho dien_thoai_id
            $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai');

            // Khai báo khóa ngoại cho phieu_xuat_id
            $table->foreign('phieu_xuat_id')->references('id')->on('phieu_xuat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_xuat');
    }
};

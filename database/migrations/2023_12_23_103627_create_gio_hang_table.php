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
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->unsignedBigInteger('chi_tiet_dien_thoai_id');
            $table->integer('so_luong');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho khach_hang_id
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');

            // Khai báo khóa ngoại cho chi_tiet_dien_thoai_id
            $table->foreign('chi_tiet_dien_thoai_id')->references('id')->on('chi_tiet_dien_thoai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hang');
    }
};

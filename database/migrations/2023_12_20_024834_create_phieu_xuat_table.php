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
        Schema::create('phieu_xuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('trang_thai_don_hang_id');
            $table->decimal('tong_tien', 10, 0);
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho khach_hang_id
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');

            // Khai báo khóa ngoại cho admin_id
            $table->foreign('admin_id')->references('id')->on('admin');

            // Khai báo khóa ngoại cho trang_thai_don_hang_id
            $table->foreign('trang_thai_don_hang_id')->references('id')->on('trang_thai_don_hang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_xuat');
    }
};

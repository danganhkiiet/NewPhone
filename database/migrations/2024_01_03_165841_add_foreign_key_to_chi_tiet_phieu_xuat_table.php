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
        Schema::table('chi_tiet_phieu_xuat', function (Blueprint $table) {
                       // Xóa ràng buộc khóa ngoại hiện tại
                       $table->dropForeign(['dien_thoai_id']);
                       // Thêm ràng buộc khóa ngoại mới
                       $table->foreign('chi_tiet_dien_thoai_id')->references('id')->on('chi_tiet_dien_thoai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_phieu_xuat', function (Blueprint $table) {
            //
        });
    }
};

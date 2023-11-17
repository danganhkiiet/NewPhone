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
        Schema::create('chi_tiet_phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->integer('dien_thoai_id');
            $table->integer('phieu_nhap_id');
            $table->integer('so_luong');
            $table->float('gia_nhap');
            $table->float('gia_ban');
            $table->float('thanh_tien');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_nhap');
    }
};

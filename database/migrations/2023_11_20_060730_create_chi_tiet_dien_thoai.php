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
            $table->integer('dien_thoai_id');
            $table->integer('mau_sac_id');
            $table->integer('dung_luong_id');
            $table->integer('so_luong');
            $table->decimal('gia_ban');
            $table->timestamps();
            $table->softDeletes();
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

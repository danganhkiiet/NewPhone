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
        Schema::create('dien_thoai_thong_so', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dien_thoai_id');
            $table->unsignedBigInteger('thong_so_id');
            $table->string('gia_tri');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho dien_thoai_id
            $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai');

            // Khai báo khóa ngoại cho thong_so_id
            $table->foreign('thong_so_id')->references('id')->on('thong_so');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dien_thoai_thong_so');
    }
};

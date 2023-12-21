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
        Schema::create('hinh_anh', function (Blueprint $table) {
            $table->id();
            $table->string('duong_dan');
            $table->unsignedBigInteger('dien_thoai_id');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho dien_thoai_id
            $table->foreign('dien_thoai_id')->references('id')->on('dien_thoai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh');
    }
};

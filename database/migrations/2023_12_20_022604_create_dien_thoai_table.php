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
        Schema::create('dien_thoai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nha_san_xuat_id'); // Sử dụng unsignedBigInteger vì đây là khóa ngoại
            $table->string('ten');
            $table->string('mo_ta');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại
            $table->foreign('nha_san_xuat_id')->references('id')->on('nha_san_xuat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dien_thoai');
    }
};

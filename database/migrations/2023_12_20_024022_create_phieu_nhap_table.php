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

        Schema::create('phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('nha_cung_cap_id');
            $table->string('thong_tin_nguoi_giao');
            $table->decimal('tong_tien', 10, 0);
            $table->dateTime('ngay_nhap_hang');
            $table->timestamps();
            $table->softDeletes();

            // Khai báo khóa ngoại cho admin_id
            $table->foreign('admin_id')->references('id')->on('admin');

            // Khai báo khóa ngoại cho nha_cung_cap_id
            $table->foreign('nha_cung_cap_id')->references('id')->on('nha_cung_cap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhap');
    }
};

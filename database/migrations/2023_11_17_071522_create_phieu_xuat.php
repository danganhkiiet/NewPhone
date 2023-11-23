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
            $table->integer('khach_hang_id');
            $table->integer('admin_id');
            $table->decimal('tong_tien');
            $table->integer('trang_thai_don_hang_id');
            $table->timestamps();
            $table->softDeletes();
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

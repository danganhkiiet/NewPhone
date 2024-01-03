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
            $table->renameColumn('dien_thoai_id', 'chi_tiet_dien_thoai_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_phieu_xuat', function (Blueprint $table) {
            $table->renameColumn('chi_tiet_dien_thoai_id', 'dien_thoai_id');
        });
    }
};

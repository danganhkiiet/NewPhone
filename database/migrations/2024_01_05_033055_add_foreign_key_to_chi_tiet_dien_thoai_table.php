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
        // Schema::table('chi_tiet_dien_thoai', function (Blueprint $table) {
        //     $table->foreign('ram_id')->references('id')->on('ram');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_dien_thoai', function (Blueprint $table) {
            //
        });
    }
};

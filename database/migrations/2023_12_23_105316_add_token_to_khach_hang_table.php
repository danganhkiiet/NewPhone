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
        if (!Schema::hasColumn('khach_hang', 'token')) {
            Schema::table('khach_hang', function (Blueprint $table) {
                $table->string('token')->nullable()->after('so_dien_thoai'); 
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khach_hang', function (Blueprint $table) {
            //
        });
    }
};

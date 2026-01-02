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
        Schema::table('tb_mobil', function (Blueprint $table) {
            $table->integer('harga_beli')->change();
            $table->integer('harga_jual')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_mobil', function (Blueprint $table) {
            $table->decimal('harga_beli', 15, 2)->change();
            $table->decimal('harga_jual', 15, 2)->change();
        });
    }
};

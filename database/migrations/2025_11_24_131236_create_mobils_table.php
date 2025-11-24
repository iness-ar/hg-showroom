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
       Schema::create('mobils', function (Blueprint $table) {
    $table->id();
    $table->string('nama_mobil');
    $table->string('tipe_mobil')->nullable();
    $table->integer('tahun');
    $table->integer('stok');
    $table->integer('harga');
    $table->text('deskripsi')->nullable();
    $table->string('status');
    $table->string('foto_mobil');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};

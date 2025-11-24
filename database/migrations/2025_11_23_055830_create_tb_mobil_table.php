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
        Schema::create('tb_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil', 255);
            
            // Foreign Key ke tb_merk
            $table->foreignId('id_merk')->constrained('tb_merk'); 
            
            $table->integer('tahun'); // Menggunakan INTEGER untuk tahun (YEAR)
            $table->decimal('harga_beli', 15, 2); // DECIMAL(15, 2)
            $table->decimal('harga_jual', 15, 2); // DECIMAL(15, 2)
            $table->enum('status', ['tersedia', 'terjual', 'pre-order'])->default('tersedia');
            $table->dateTime('tanggal_masuk');
            $table->string('keterangan', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mobil');
    }
};
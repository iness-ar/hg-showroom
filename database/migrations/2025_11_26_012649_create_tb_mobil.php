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
            $table->string('tipe_mobil', 255)->nullable();
            
            // Foreign Key ke tb_merk
            $table->foreignId('id_merk')->constrained('tb_merk')->onDelete('cascade');
            
            $table->year('tahun');
            $table->decimal('harga_beli', 15, 2);
            $table->decimal('harga_jual', 15, 2);
            $table->integer('stok');
            $table->enum('status', ['Ready', 'Sold Out', 'Pre Order']);
            $table->text('deskripsi')->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->string('foto_mobil', 255)->nullable(); 
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
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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli', 255);
            $table->string('nomor_hp', 255);
            $table->string('alamat', 255);

            // Foreign Key ke tb_admin (user_id = admin yang memproses)
            $table->foreignId('user_id')->constrained('tb_admin'); 
            
            $table->dateTime('tanggal_transaksi');
            $table->enum('tipe_transaksi', ['cash', 'kredit'])->default('cash');
            $table->decimal('total_pembelian', 15, 2); // DECIMAL(15, 2)
            $table->enum('status_penjualan', ['sukses', 'pending', 'batal'])->default('pending');
            $table->string('keterangan', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
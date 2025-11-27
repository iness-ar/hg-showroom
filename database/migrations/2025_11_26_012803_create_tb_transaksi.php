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
            $table->string('nomor_telepon', 255);
            $table->string('alamat', 255);
            
           
            $table->foreignId('user_id')->constrained('tb_admin')->onDelete('restrict');

            $table->dateTime('tanggal_transaksi');
            $table->enum('tipe_transaksi', ['Cash', 'Kredit']);
            $table->decimal('total_pembelian', 15, 2);
            $table->enum('status_penjualan', ['Pending', 'Selesai', 'Batal']);
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
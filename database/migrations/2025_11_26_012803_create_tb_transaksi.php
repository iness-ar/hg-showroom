<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id')->constrained('tb_mobil')->onDelete('restrict');
            $table->string('nama_pembeli', 255);
            $table->string('nomor_telepon', 255)->nullable();
            $table->text('alamat');
            $table->date('tanggal_transaksi');
            $table->enum('tipe_transaksi', ['Online', 'Offline', 'Dropship']);
            $table->bigInteger('total_pembelian');
            $table->enum('status_penjualan', ['Lunas', 'Belum Lunas', 'Dibatalkan', 'Dalam Proses']);
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('mobils', function (Blueprint $table) {
        $table->string('nama_mobil')->after('id');
        $table->string('tipe_mobil')->nullable()->after('nama_mobil');
        $table->integer('tahun')->after('tipe_mobil');
        $table->integer('stok')->after('tahun');
        $table->integer('harga')->after('stok');
        $table->text('deskripsi')->nullable()->after('harga');
        $table->string('status')->after('deskripsi');
        $table->string('foto_mobil')->after('status');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            //
        });
    }
};

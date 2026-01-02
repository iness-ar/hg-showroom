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
    Schema::table('tb_transaksi', function (Blueprint $table) {
        $table->bigInteger('jumlah_cicilan')->nullable()->after('total_pembelian');
        $table->bigInteger('sisa_cicilan')->nullable()->after('jumlah_cicilan');
    });
}

public function down()
{
    Schema::table('tb_transaksi', function (Blueprint $table) {
        $table->dropColumn(['jumlah_cicilan', 'sisa_cicilan']);
    });
}

};

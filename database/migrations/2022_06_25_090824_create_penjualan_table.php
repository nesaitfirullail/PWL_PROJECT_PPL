<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_pelanggan');
            $table->unsignedBigInteger('kode_barang');
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('jumlah')->default(0);
            $table->enum('status', ['diambil', 'diantar'])->default('diambil');
            $table->timestamps();

            $table->foreign('kode_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kode_barang')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}

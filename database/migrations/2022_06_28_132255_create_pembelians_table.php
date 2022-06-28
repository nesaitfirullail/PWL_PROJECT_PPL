<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_karyawan');
            $table->unsignedBigInteger('kode_supplier');
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('jumlah')->default(0);
            $table->enum('status', ['diambil', 'diantar'])->default('diambil');
            $table->timestamps();

            $table->foreign('kode_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('kode_supplier')->references('id')->on('supplier')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->integer('quantity');
            $table->string('bukti_bayar')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('tb_produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};

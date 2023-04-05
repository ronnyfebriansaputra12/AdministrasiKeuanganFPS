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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemasukan');
            $table->integer('pembayaran_wasit');
            $table->integer('laundry');
            $table->integer('fotografer');
            $table->integer('korlap');
            $table->integer('admin');
            $table->integer('lapangan');
            $table->integer('air_mineral');
            $table->integer('konten_kreator');
            $table->integer('kid_man');
            $table->timestamps();

            $table->foreign('id_pemasukan')->references('id')->on('pemasukans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};

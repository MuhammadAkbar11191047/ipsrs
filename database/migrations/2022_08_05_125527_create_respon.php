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
        Schema::create('respon', function (Blueprint $table) {
            $table->id();
            $table->UnSignedBigInteger('id_laporan');
            $table->string('bagian');
            $table->string('petugas');
            $table->string('status_pekerjaan');
            $table->string('lokasi');
            $table->string('ruangan');
            $table->string('no_ruangan');
            $table->string('biaya');
            $table->text('pekerjaan');
            $table->datetime('tanggal');
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('id_laporan')->references('id')->on('laporan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respon');
    }
};

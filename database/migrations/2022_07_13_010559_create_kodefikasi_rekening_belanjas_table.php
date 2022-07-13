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
        Schema::create('kodefikasi_rekening_belanjas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rekening_belanja');
            $table->string('nama_rekening_belanja');
            $table->string('penjelasan_rekening_belanja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kodefikasi_rekening_belanjas');
    }
};

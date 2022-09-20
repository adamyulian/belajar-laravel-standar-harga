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
        Schema::create('hspks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_komp');
            $table->string('nama_hspk');
            $table->text('penjelasan_hspk');
            $table->string('nilai_hspk');
            $table->string('pajak');
            $table->foreignId('satuan_id');
            $table->foreignId('kodefikasi_rekening_belanja_id');
            $table->foreignId('kodefikasi_aset_id');
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
        Schema::dropIfExists('hspks');
    }
};

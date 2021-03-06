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
        Schema::create('standar_hargas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_komp');
            $table->string('nama_komp');
            $table->text('spesifikasi');
            $table->string('harga_satuan');
            $table->string('pajak');
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
        Schema::dropIfExists('standar_hargas');
    }
};

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
        Schema::create('usulan_hspks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('standar_harga_id');
            $table->foreignId('satuan_id');
            $table->string('kode_hspk');
            $table->string('nama_hspk');
            $table->string('koefisien_harga_hspk');
            $table->string('jumlah_bahan_hspk');
            $table->string('jumlah_tenaga_hspk');
            $table->string('jumlah_peralatan_hspk');
            $table->string('jumlah_total_hspk');
            $table->string('overheadprofit_hspk');
            $table->text('keterangan');
            $table->string('harga_hspk');
            $table->string('koefisien');
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
        Schema::dropIfExists('usulan_hspks');
    }
};

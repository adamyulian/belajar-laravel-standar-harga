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
            $table->string('kode_hspk');
            $table->string('nama_hspk');
            $table->foreignId('satuan_id');
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

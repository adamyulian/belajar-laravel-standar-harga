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
        Schema::create('hspk_rincian_temps', function (Blueprint $table) {
            $table->id();
            $table->string('subkode_hspk');
            $table->string('koefisien_hspk');
            $table->string('subnilai_hspk');
            $table->foreignId('hspk_id');
            $table->foreignId('standar_harga_id');
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
        Schema::dropIfExists('hspk_rincian_temps');
    }
};

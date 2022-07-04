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
        Schema::create('tambah_usulans', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->date('tanggal_usulan');
            $table->string('perangkat_daerah');
            $table->string('jenis_usulan');
            $table->string('jumlah_komponen');
            $table->string('jumlah_dukungan_penyedia');
            $table->string('nomor_surat');
            $table->string('penjelasan_komponen');
            $table->string('file_excel_dukungan');
            $table->string('file_rar_dukungan');
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
        Schema::dropIfExists('tambah_usulans');
    }
};

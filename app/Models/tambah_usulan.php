<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class tambah_usulan extends Model

{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_usulan',
        'jenis_usulan',
        'jumlah_komponen',
        'jumlah_dukungan_penyedia',
        'nomor_surat',
        'penjelasan_komponen',
        'file_excel_dukungan',
        'file_rar_dukungan'];

        public function user()
        {
            return $this->belongsTo(user::class);
    }
}

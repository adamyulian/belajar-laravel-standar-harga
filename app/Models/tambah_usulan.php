<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambah_usulan extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'tanggal_usulan',
        'perangkat_daerah',
        'jenis_usulan',
        'jumlah_komponen',
        'jumlah_dukungan_penyedia',
        'nomor_surat',
        'penjelasan_komponen',
        'file_excel_dukungan',
        'file_rar_dukungan'];
    }

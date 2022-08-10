<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usulan_hspk extends Model
{
    use HasFactory;

    protected $fillable = [
            'standar_harga_id',
            'satuan_id',
            'kode_hspk',
            'nama_hspk',
            'koefisien_harga_hspk',
            'jumlah_bahan_hspk',
            'jumlah_tenaga_hspk',
            'jumlah_peralatan_hspk',
            'jumlah_total_hspk',
            'overheadprofit_hspk',
            'keterangan',
            'harga_hspk',
            'koefisien',
        ];

        public function kodefikasi_aset()
            {
            return $this->belongsTo(kodefikasi_aset::class);
            }
}

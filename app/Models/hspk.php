<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hspk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodefikasi_aset_id',
        'kode_komp',
        'nama_hspk',
        'penjelasan_hspk',
        'satuan_id',
        'nilai_hspk',
        'kodefikasi_rekening_belanja_id',
        'pajak',
        'standar_harga_id'
        ];

    public function kodefikasi_aset()
    {
        return $this->belongsTo(kodefikasi_aset::class);
    }
    public function kodefikasi_rekening_belanja()
    {
        return $this->belongsTo(KodefikasiRekeningBelanja::class);
    }
    public function satuan()
    {
        return $this->belongsTo(satuan::class);
    }
    public function standar_harga()
    {
        return $this->belongsTo(standar_harga::class);
    }
    public function hspk_rincian()
    {
        return $this->belongsTo(hspk_rincian::class);
    }
}

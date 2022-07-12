<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standar_harga extends Model
{
    use HasFactory;

    protected $fillable = [
    'kodefikasi_aset_id',
    'kode_komp',
    'nama_komp',
    'spesifikasi',
    'satuan',
    'harga_satuan',
    'pajak',
    'rek_belanja'];

    public function kodefikasi_asets()
    {
        return $this->belongsTo(kodefikasi_aset::class,'kodefikasi_aset_id');
    }

}

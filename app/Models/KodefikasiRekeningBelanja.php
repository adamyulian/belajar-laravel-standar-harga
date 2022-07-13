<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodefikasiRekeningBelanja extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kodefikasi_rekening_belanja(){
        return $this->hasMany(standar_harga::class, "kodefikasi_rekening_belanja_id");
     }
}

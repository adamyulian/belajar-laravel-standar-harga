<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kodefikasi_aset extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kodefikasi_aset(){
        return $this->hasMany(standar_harga::class, "kodefikasi_aset_id");
     }
}

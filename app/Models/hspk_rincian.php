<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hspk_rincian extends Model
{
    use HasFactory;

    protected $fillable = [
        'subkode_hspk',
        'koefisien_hspk',
        'subnilai_hspk',
        'hspk_id',
        'standar_harga_id',
        ];
    public function hspk()
    {
        return $this->belongsTo(hspk::class);
    }
    public function standar_harga()
    {
        return $this->belongsTo(standar_harga::class);
    }
}

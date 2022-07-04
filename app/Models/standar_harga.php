<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standar_harga extends Model
{
    use HasFactory;

    protected $fillable = [
    'kode_komp',
    'nama_komp',
    'spesifikasi',
    'satuan',
    'harga_satuan',
    'pajak',
    'rek_belanja'];
}

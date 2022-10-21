<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subnilaihspk extends Model
{
    use HasFactory;
    protected $fillable = [
        'subnilai',
        'hspk_rincian_id',
        ];
    public function hspk_rincian()
    {
        return $this->belongsTo(hspk_rincian::class);
    }
}

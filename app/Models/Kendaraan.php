<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Perjalanan;
use App\Models\Supir;

class Kendaraan extends Model
{
    protected $fillable = [
        'plat_nomor',
        'jenis',
        'merek',
        'tahun',
        'supir_id',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class);
    }

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }
}

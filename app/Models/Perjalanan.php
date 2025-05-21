<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $fillable = [
        'supir_id',
        'kendaraan_id',
        'trayek_id',
        'tanggal_berangkat',
        'tanggal_pulang',
    ];

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function trayek()
    {
        return $this->belongsTo(Trayek::class);
    }
}

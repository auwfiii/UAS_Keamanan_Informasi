<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Perjalanan;

class Trayek extends Model
{
    protected $fillable = [
        'kode_trayek',
        'asal',
        'tujuan',
        'jarak',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class);
    }
}

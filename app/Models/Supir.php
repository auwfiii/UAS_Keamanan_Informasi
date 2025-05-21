<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Perjalanan;

class Supir extends Model
{
    protected $fillable = [
        'nama',
        'no_sim',
        'alamat',
        'telepon',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class);
    }
}

<?php

namespace App;

use App\Obat;
use Illuminate\Database\Eloquent\Model;

class Signa extends Model
{
    protected $fillable = [
        'signa', 'contoh'
    ];

    public function obatid()
    {
        return $this->belongsTo(Obat::class, 'contoh');
    }
}
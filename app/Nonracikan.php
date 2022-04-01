<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Obat;
use App\Signa;

class Nonracikan extends Model
{
    protected $fillable = [
        'nama_obat', 'signa', 'qty'
    ];

    public function obatid()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
    public function signaid()
    {
        return $this->belongsTo(Signa::class, 'signa_id');
    }
}
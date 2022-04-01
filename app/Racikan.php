<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racikan extends Model
{
    protected $fillable = [
        'nama_racikan', 'signa', 'qty', 'obat_id'
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
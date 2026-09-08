<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'bab_id',
        'total_kata',
        'poin_a',
        'poin_b',
        'poin_c',
        'nilai',
        'level',
        'tab',
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }

    public function details()
    {
        return $this->hasMany(DetailNilai::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kotoba extends Model
{
    protected $fillable = ['bab_id', 'jepang', 'kanji', 'romaji', 'arti', 'kategori', 'urutan'];

    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }
}
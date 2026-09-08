<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailNilai extends Model
{
    protected $fillable = ['nilai_id', 'jepang', 'kanji', 'romaji', 'arti', 'jawaban', 'poin', 'benar', 'waktu', 'urutan'];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }
}
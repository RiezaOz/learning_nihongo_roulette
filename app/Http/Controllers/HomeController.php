<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Kotoba;

class HomeController extends Controller
{
    public function index()
    {
        $babs = Bab::all();
        return view('home', compact('babs'));
    }

    public function show($id)
    {
        $bab = Bab::findOrFail($id);
        
        // Untuk rekap: ambil semua kata dari bab 1 sampai bab ini
        $rekapKata = [];
        if ($bab->minggu > 1) {
            $rekapKata = Kotoba::whereIn('bab_id', range(1, $bab->id))
                ->orderBy('bab_id')
                ->orderBy('urutan')
                ->get()
                ->map(function($k) {
                    return [
                        'id' => $k->id,
                        'urutan' => $k->urutan,
                        'kanji' => $k->kanji,
                        'jepang' => $k->jepang,
                        'romaji' => $k->romaji,
                        'arti' => $k->arti,
                        'bab' => $k->bab_id,
                    ];
                });
        }
        
        return view('bab', compact('bab', 'rekapKata'));
    }
}
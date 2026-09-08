<?php

namespace App\Http\Controllers;

use App\Models\Nilai;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Nilai::with('bab')->orderBy('created_at', 'desc')->get();
        return view('riwayat', compact('riwayats'));
    }

    public function show($id)
    {
        $nilai = Nilai::with(['bab', 'details'])->findOrFail($id);
        return view('riwayat-detail', compact('nilai'));
    }

    public function destroy($id)
    {
        Nilai::findOrFail($id)->delete();
        return redirect()->route('riwayat')->with('success', 'Riwayat berhasil dihapus!');
    }
}
public function start(Request $request)
{
    $bab_id = $request->bab_id; 
    $level = $request->level; 
    $tab = $request->tab;
    $bab = Bab::findOrFail($bab_id);
    
    if ($tab == 1) {
        // Hanya kata dari bab ini
        $kotobas = Kotoba::where('bab_id', $bab_id)->orderBy('urutan')->get();
    } else {
        // Rekap: semua kata dari bab 1 sampai bab ini, random max 50
        $kotobas = Kotoba::whereIn('bab_id', range(1, $bab->id))
            ->inRandomOrder()
            ->limit(50)
            ->get();
    }
    
    $kotobas = $kotobas->shuffle()->values();
    session(['kotobas'=>$kotobas,'index'=>0,'level'=>$level,'hasil'=>[],'last_waktu'=>0,'last_poin'=>'','last_jawaban'=>'','bab_id'=>$bab_id,'tab'=>$tab]);
    return redirect()->route('roulette.show');
}
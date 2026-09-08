<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BabSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET session_replication_role = replica;');
        DB::table('babs')->truncate();
        DB::statement('SET session_replication_role = origin;');

        $babs = [
            ['nama' => 'Bab 1', 'minggu' => 1, 'total_kata' => 40],
            ['nama' => 'Bab 2', 'minggu' => 2, 'total_kata' => 76],
            ['nama' => 'Bab 3', 'minggu' => 3, 'total_kata' => 49],
        ];

        foreach ($babs as $bab) {
            \App\Models\Bab::create($bab);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bab;

class BabSeeder extends Seeder
{
    public function run()
    {
        $babs = [
            ['nama' => 'Bab 1', 'minggu' => 1, 'total_kata' => 40],
            ['nama' => 'Bab 2', 'minggu' => 2, 'total_kata' => 76],
            ['nama' => 'Bab 3', 'minggu' => 3, 'total_kata' => 49],
        ];

        foreach ($babs as $bab) {
            Bab::create($bab);
        }
    }
}
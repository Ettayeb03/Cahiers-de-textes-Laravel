<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeSeeder extends Seeder
{
    public function run()
    {
        DB::table('groupes')->insert([
            ['name' => 'G1 3IIR'],
            ['name' => 'G2 3IIR'],
            ['name' => 'G3 3IIR'],
        ]);
    }
}

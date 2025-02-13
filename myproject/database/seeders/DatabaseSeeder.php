<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appelez les seeders nécessaires ici
        $this->call(AdminSeeder::class);
        $this->call(ProfSeeder::class);

    }
    


}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Admin', // Ajouter firstname
                'lastname' => '1', // Ajouter lastname
                'email' => 'admin1@emsi-edu.ma',
                'password' => Hash::make('admin123'), // Utiliser Hash pour sécuriser les mots de passe
                'phone' => '067654333',
                'role' => 'admin', // Rôle d'administrateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Ettayeb', // Ajouter firstname
                'lastname' => 'Benchekroune', // Ajouter lastname
                'email' => 'Ettayeb.benchkroune@emsi-edu.ma',
                'password' => Hash::make('Tayeb123'),
                'phone' => '0621769917',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

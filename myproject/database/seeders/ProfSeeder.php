<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  
use App\Models\Prof;  
use Illuminate\Support\Facades\Hash;

class ProfSeeder extends Seeder
{
    public function run()
    {
        // Tableau des utilisateurs à insérer
        $users = [
            [
                'email' => 'prof1@emsi-edu.ma',
                'firstname' => 'Prof1',
                'lastname' => 'Lastname1',
                'password' => Hash::make('prof123'), // Utilisez un mot de passe sécurisé
                'phone' => '063456789',
                'role' => 'prof',
            ],
            [
                'email' => 'amine@emsi-edu.ma',
                'firstname' => 'Amine',
                'lastname' => 'Zeguendri',
                'password' => Hash::make('amine123'),
                'phone' => '067654321',
                'role' => 'prof',
            ],
            
        ];

        // Insérer ou mettre à jour les utilisateurs
        foreach ($users as $userData) {
            // Vérifiez si l'email existe déjà
            $user = User::firstOrCreate(
                ['email' => $userData['email']],  // Recherche par email
                $userData  // Si l'email n'existe pas, on insère les nouvelles données
            );

            // Créez le professeur lié à l'utilisateur
            Prof::updateOrCreate(
                ['user_id' => $user->id],
                ['firstname' => $user->firstname, 'lastname' => $user->lastname, 'phone' => $user->phone]
            );
        }
    }
}

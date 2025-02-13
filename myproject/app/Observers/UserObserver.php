<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Prof;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Vérifier si le rôle est "prof"
        if ($user->role === 'prof') {
            // Créer un nouveau professeur dans la table `profs`
            Prof::create([
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'password' => $user->password,
                'phone' => $user->phone, // Assurez-vous que l'utilisateur a un téléphone
                'user_id' => $user->id,
            ]);
        }
    }
}

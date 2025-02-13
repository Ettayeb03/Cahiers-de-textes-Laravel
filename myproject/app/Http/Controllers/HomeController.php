<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Groupe; // Assurez-vous d'importer le modèle Groupe
use App\Models\Filiere; // Assurez-vous d'importer le modèle Filiere



class HomeController extends Controller
{
    public function show()
{
    // Récupérer les groupes et les filières
    $groupes = Groupe::all(); // Récupère tous les groupes
    $filieres = Filiere::all(); // Récupère toutes les filières

    // Passer les données à la vue
    return view('home', compact('groupes', 'filieres'));
}
    public function index(Request $request)
    {
        // Vérifie si l'email est présent dans la requête GET
        $email = $request->query('email'); // Ou $request->get('email')

        return view('home', [
            'email' => $email, // Passe l'email à la vue
        ]);
    }

}
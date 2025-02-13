<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    /**
     * Afficher la liste des professeurs.
     */
    public function index()
    {
        $profs = Prof::all();
        return view('profs.index', compact('profs'));
    }

    /**
     * Afficher le formulaire pour créer un nouveau professeur.
     */
    public function create()
    {
        return view('profs.create');
    }

    /**
     * Enregistrer un nouveau professeur.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Vérifie unicité dans la table users
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'prof', 
        ]);

        // Créer le professeur lié à l'utilisateur
        Prof::create([
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('profs.index')->with('success', 'Professeur ajouté avec succès.');
    }

    /**
     * Afficher le formulaire pour modifier un professeur existant.
     */
    public function edit($id)
    {
        $prof = Prof::findOrFail($id);
        return view('profs.edit', compact('prof'));
    }

    /**
     * Mettre à jour les informations d'un professeur.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:prof,email,' . $prof->id, // Exclure l'email du professeur actuel
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6', // Rendre le mot de passe optionnel
        ]);

        // Récupérer le professeur et l'utilisateur associé
        $prof = Prof::findOrFail($id);
        $user = $prof->user;

        // Mettre à jour les données du professeur
        $prof->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
        ]);

        // Mettre à jour les données de l'utilisateur
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
        ]);

        // Mettre à jour le mot de passe si fourni
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('profs.index')->with('success', 'Professeur mis à jour avec succès.');
    }

    /**
     * Supprimer un professeur.
     */
    public function destroy($id)
    {
        $prof = Prof::findOrFail($id);

        // Supprimer l'utilisateur associé
        $prof->user->delete();

        // Supprimer le professeur
        $prof->delete();

        return redirect()->route('profs.index')->with('success', 'Professeur supprimé avec succès.');
    }
}

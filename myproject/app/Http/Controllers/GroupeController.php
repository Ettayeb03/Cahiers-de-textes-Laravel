<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Filiere;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    // Afficher tous les groupes
    public function index()
    {
        // Récupérer tous les groupes avec leurs relations
        $groupes = Groupe::with('filiere')->get(); 
        return view('groupes.index', compact('groupes'));
    }

    // Afficher le formulaire d'édition pour un groupe
    public function edit($id)
    {
        // Récupérer le groupe à modifier
        $groupe = Groupe::findOrFail($id);

        // Récupérer les filières disponibles
        $filieres = Filiere::all();

        return view('groupes.edit', compact('groupe', 'filieres'));
    }

    // Afficher un groupe par son ID
    public function show($id)
    {
        // Récupérer un groupe avec ses relations
        $groupe = Groupe::with('filiere')->findOrFail($id);

        return view('groupes.show', compact('groupe'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        // Récupérer toutes les filières disponibles
        $filieres = Filiere::all();

        return view('groupes.create', compact('filieres'));
    }

    // Enregistrer un nouveau groupe
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'annee' => 'required|integer',
            'nom_grp' => 'required|string|max:255',
            'filiere_id' => 'required|exists:filieres,id', // Vérification que la filière existe
        ]);

        // Créer un nouveau groupe
        Groupe::create($validated);

        // Rediriger avec un message de succès
        return redirect()->route('groupes.index')->with('success', 'Groupe créé avec succès.');
    }

    // Mettre à jour un groupe existant
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'nom_grp' => 'required|string|max:255',
            'annee' => 'required|integer',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        // Récupérer le groupe par son ID
        $groupe = Groupe::findOrFail($id);

        // Mettre à jour le groupe
        $groupe->update($validated);

        // Rediriger avec un message de succès
        return redirect()->route('groupes.index')->with('success', 'Groupe mis à jour avec succès.');
    }

    // Supprimer un groupe
    public function destroy($id)
    {
        // Récupérer le groupe par son ID
        $groupe = Groupe::findOrFail($id);

        // Supprimer le groupe
        $groupe->delete();

        // Rediriger avec un message de succès
        return redirect()->route('groupes.index')->with('success', 'Groupe supprimé avec succès.');
    }
}

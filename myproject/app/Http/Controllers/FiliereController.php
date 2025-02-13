<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Prof;
use App\Models\Module;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    // Affiche toutes les filières avec leurs professeurs, modules et groupes associés
    public function index()
    {
        // Récupérer toutes les filières avec leurs professeurs, modules et groupes associés
        $filieres = Filiere::with(['profs', 'modules', 'groupes'])->get();
        return view('filieres.index', compact('filieres'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        // Récupérer tous les professeurs et modules pour la sélection
        $profs = Prof::all();
        $modules = Module::all();
        return view('filieres.create', compact('profs', 'modules'));
    }

    // Enregistre une nouvelle filière
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'nom_fil' => 'required|string|max:255',
            'annee' => 'required|integer',
            'nombre_de_groupes' => 'nullable|integer', // Assurez-vous que c'est bien un entier
        ]);

        // Créer une nouvelle filière avec les données validées
        $filiere = Filiere::create([
            'nom_fil' => $validated['nom_fil'],
            'annee' => $validated['annee'],
            'nombre_de_groupes' => $validated['nombre_de_groupes'], // Enregistrer la valeur saisie
        ]);


        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès.');
    }

    // Affiche les détails d'une filière
    public function show($id)
    {
        // Récupérer la filière avec ses professeurs, modules et groupes associés
        $filiere = Filiere::with(['profs', 'modules', 'groupes'])->findOrFail($id);
        return view('filieres.show', compact('filiere'));
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        // Récupérer la filière avec ses professeurs et modules
        $filiere = Filiere::with(['profs', 'modules'])->findOrFail($id);
        $profs = Prof::all();
        $modules = Module::all();
        return view('filieres.edit', compact('filiere', 'profs', 'modules'));
    }

    // Met à jour une filière
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire, y compris 'nombre_de_groupes'
        $validated = $request->validate([
            'nom_fil' => 'required|string|max:255',
            'annee' => 'required|integer',
            'nombre_de_groupes' => 'nullable|integer', // Ajout de la validation pour nombre_de_groupes
        ]);

        $filiere = Filiere::findOrFail($id);
        $filiere->update($validated); // Mise à jour de la filière, y compris nombre_de_groupes


        return redirect()->route('filieres.index')->with('success', 'Filière mise à jour avec succès.');
    }

    // Supprime une filière
    public function destroy($id)
    {
        $filiere = Filiere::findOrFail($id);
        $filiere->delete();

        return redirect()->route('filieres.index')->with('success', 'Filière supprimée avec succès.');
    }
}

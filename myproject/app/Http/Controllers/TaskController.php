<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Groupe;
use App\Models\Prof;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create()
    {
        // Récupérer les groupes et les filières pour les afficher dans les menus déroulants
        $groupes = Groupe::all();
        $filieres = Filiere::all();

        return view('home', compact('groupes', 'filieres'));
    }

    public function store(Request $request)
{
    // Valider les données
    $request->validate([
        'contenu' => 'required',
        'groupe_id' => 'required|exists:groupes,id',
        'filiere_id' => 'required|exists:filieres,id',
        'date' => 'required|date',
        'heure' => 'required|date_format:H:i',
    ]);

    // Créer une tâche dans la table tasks
    Task::create([
        'contenu' => $request->contenu,
        'prof_id' => Auth::user()->prof->id,  
        'groupe_id' => $request->groupe_id,
        'filiere_id' => $request->filiere_id,
        'date' => $request->date,
        'heure' => $request->heure,
    ]);

    return redirect()->route('home')->with('success', 'Le travail a été ajouté avec succès.');
}

public function edit($id)
{
    $cahier = Task::findOrFail($id);
    return view('cahiers.edit', compact('cahier'));
}

public function destroy($id)
{
    $cahier = Task::findOrFail($id);
    $cahier->delete();

    return redirect()->route('historique.cahiers')->with('success', 'Cahier de texte supprimé avec succès.');
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'groupe' => 'required|string',
        'filiere' => 'required|string',
        'date' => 'required|date',
        'heure' => 'required|date_format:H:i',
        'contenu' => 'required|string|max:1000',
    ]);
    

    $cahier = Task::findOrFail($id);
    $cahier->update($validated);

    return redirect()->route('historique.cahiers')->with('success', 'Cahier de texte mis à jour avec succès.');
}

    
}

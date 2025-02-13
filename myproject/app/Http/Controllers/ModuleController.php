<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Afficher la liste des modules
    public function index()
    {
        // Récupérer tous les modules depuis la base de données
        $modules = Module::all();
    
        // Retourner la vue avec les modules
        return view('modules.index', compact('modules'));
    }

    // Méthode pour afficher le formulaire de création de module
    public function create()
    {
        return view('modules.create');  // Assurez-vous que la vue 'modules.create' existe
    }

    // Méthode pour enregistrer un nouveau module
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'submodules' => 'nullable|string', // Sous-modules optionnels
            'coefficient' => 'required|numeric|min:0', // Coefficient requis
        ]);

        // Créer le module
        Module::create([
            'name' => $request->name,
            'submodules' => $request->submodules,
            'coefficient' => $request->coefficient,
        ]);

        // Rediriger vers la liste des modules avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module créé avec succès');
    }

    // Méthode pour afficher le formulaire d'édition
    public function edit($id)
    {
        // Récupérer le module par son ID
        $module = Module::findOrFail($id);

        // Retourner la vue 'modules.edit' avec le module à modifier
        return view('modules.edit', compact('module'));
    }

    // Méthode pour mettre à jour le module
    public function update(Request $request, $id)
    {
        // Valider les données envoyées par le formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'submodules' => 'nullable|string', // Sous-modules optionnels
            'coefficient' => 'required|numeric|min:0', // Coefficient requis
        ]);

        // Récupérer le module par son ID
        $module = Module::findOrFail($id);

        // Mettre à jour les valeurs du module
        $module->update([
            'name' => $request->name,
            'submodules' => $request->submodules,
            'coefficient' => $request->coefficient,
        ]);

        // Rediriger vers la liste des modules avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès');
    }

    // Méthode pour supprimer un module
    public function destroy($id)
    {
        // Récupérer le module par son ID
        $module = Module::findOrFail($id);
    
        // Supprimer le module
        $module->delete();
    
        // Rediriger avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès');
    }
}

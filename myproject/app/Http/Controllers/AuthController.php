<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;


class AuthController extends Controller
{
    // Gère l'authentification de l'utilisateur
    public function LoginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        try {
            // Authentification pour la table 'users' avec le guard personnalisé
            $credentials = $request->only('email', 'password');

            if (Auth::guard('users')->attempt($credentials)) {
                // Vérifier le rôle de l'utilisateur
                $user = Auth::user();

                if ($user->role == 'admin') {
                    // Redirige vers la page d'administration si le rôle est admin
                    return redirect('/admin')->with('success', 'Bienvenue, administrateur!');
                } elseif ($user->role == 'prof') {
                    // Redirige vers la page des professeurs si le rôle est prof
                    return redirect('/home')->with('success', 'Bienvenue, professeur!');
                }
            } else {
                // Message d'erreur si l'authentification échoue
                return redirect('/login')->with('error', 'Identifiants incorrects.');
            }
        } catch (\Exception $e) {
            // Gestion des erreurs et redirection avec un message approprié
            return redirect('/login')->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('login');  // La vue que vous souhaitez afficher
    }

    // Déconnexion de l'utilisateur
    public function logout(): RedirectResponse
    {
        Auth::logout(); // Déconnecte l'utilisateur
        return redirect('/login'); // Redirige vers la page de connexion
    }

    // Gère l'inscription de l'utilisateur
    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    public function historiqueCahiers()
    {
    $prof = Auth::user()->prof; // Récupère le professeur connecté
    $cahiers = Task::where('prof_id', $prof->id)->with('groupe', 'filiere')->orderBy('date', 'desc')->get();

    return view('historique', compact('cahiers', 'prof'));
    }
}

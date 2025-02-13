<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Vérifie si l'utilisateur est authentifié et possède le rôle requis
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirige vers la page de connexion avec un message d'erreur
        return redirect()->route('login')->with('error', 'Accès non autorisé.');
    }
}

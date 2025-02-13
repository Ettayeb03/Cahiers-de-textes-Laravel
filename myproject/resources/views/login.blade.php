<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EMSI</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="login-container">
    <div class="logo">
        <img src="{{ asset('images/logoemsi.png') }}" alt="Logo EMSI" style="max-width: 200px;">
    </div>

    <h2 class="h2">Se connecter</h2>

    <!-- Affichage des messages flash -->
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <!-- Formulaire de connexion -->
    <form method="POST" action="{{ route('LoginUser') }}">
        @csrf

        <!-- Champ utilisateur -->
        <div class="form-group">
            <input
                type="text"
                name="email"
                class="form-input"
                placeholder="E-mail"
                value="{{ old('email') }}"
                required
            >
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ mot de passe -->
        <div class="form-group">
            <input 
                type="password" 
                name="password" 
                class="form-input" 
                placeholder="Mot de passe" 
                required
            >
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <!-- Bouton de connexion -->
        <button type="submit" class="login-btn">Se connecter</button>

    </form>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - EMSI</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<div class="navbar">
    <div class="logo">
        <img src="{{ asset('images/logoemsi.png') }}" alt="Logo EMSI">
    </div>

    <div class="current-datetime">
            <strong>Le <span id="currentDateTime"></span></strong> 
    </div>

    <div class="menu">
        <a href="{{ route('historique.cahiers') }}">Cahiers de texte</a>
    </div>

    <div class="welcome-message">
        <span>Bonjour, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
    </div>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">Se déconnecter</button>
    </form>
</div>

<div class="main-content">
    <h1>Bienvenue sur le portail EMSI</h1>

    <h2>Cahier de texte</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="task-form">
        @csrf

        <!-- Travaux -->
        <div class="form-group">
            <label for="contenu">Travail d'aujourd'hui :</label>
            <textarea id="contenu" name="contenu" placeholder="Contenu du travail..." required></textarea>
        </div>

        <!-- Groupe et Filière sur une seule ligne -->
        <div class="form-group-inline">
            <div class="form-group">
                <label for="groupe_id" class="form-label">Groupe</label>
                <select class="form-control" id="groupe_id" name="groupe_id" required>
                    <option value="" disabled selected>Choisissez un groupe</option>
                    @foreach($groupes as $groupe)
                        <option value="{{ $groupe->id }}" {{ old('groupe_id') == $groupe->id ? 'selected' : '' }}>
                            {{ $groupe->nom_grp }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="filiere_id" class="form-label">Filière</label>
                <select class="form-control" id="filiere_id" name="filiere_id" required>
                    <option value="" disabled selected>Choisissez une filière</option>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                            {{ $filiere->nom_fil }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Date et Heure sur une seule ligne -->
        <div class="form-group-inline">
            <div class="form-group">
                <label for="date">Date de la séance :</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="heure">Heure de la séance :</label>
                <input type="time" id="heure" name="heure" required>
            </div>
        </div>

        <!-- Bouton -->
        <button type="submit">Enregistrer</button>
    </form>
</div>

<script>
        // Script pour afficher la date et l'heure actuelles
        function updateDateTime() {
            const now = new Date();
            const formattedDateTime = now.toLocaleString('fr-FR', {
                dateStyle: 'short',
                timeStyle: 'short',
            });
            document.getElementById('currentDateTime').textContent = formattedDateTime;
        }
        setInterval(updateDateTime, 1000); // Mettre à jour chaque seconde
        updateDateTime(); // Initialisation
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Cahier de Texte</title>
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
            <a href="{{ route('historique.cahiers') }}">Retour</a>
        </div>
        <div class="welcome-message">
            Bonjour, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Se déconnecter</button>
        </form>
    </div>

    <div class="main-content">
        <h1>Modifier le Cahier de Texte</h1>

        <form action="{{ route('cahiers.update', $cahier->id) }}" method="POST" class="task-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="groupe">Groupe :</label>
                <input type="text" id="groupe" name="groupe" value="{{ old('groupe->nom_grp', $cahier->groupe->nom_grp) }}" required>
            </div>
            
            <div class="form-group">
                <label for="filiere">Filière :</label>
                <input type="text" id="filiere" name="filiere" value="{{ old('filiere->nom_fil', $cahier->filiere->nom_fil) }}" required>
            </div>
            
            <div class="form-group">
                <label for="date">Date de la séance :</label>
                <input type="date" id="date" name="date" value="{{ old('date', $cahier->date) }}" required>
            </div>

            <div class="form-group">
                <label for="heure">Heure de la séance :</label>
                <input type="time" id="heure" name="heure" value="{{ old('heure', $cahier->heure) }}" required>
            </div>

            <div class="form-group">
                <label for="contenu">Contenu :</label>
                <textarea id="contenu" name="contenu" required>{{ old('contenu', $cahier->contenu) }}</textarea>
            </div>
            


            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const formattedDateTime = now.toLocaleString('fr-FR', {
                dateStyle: 'short',
                timeStyle: 'short',
            });
            document.getElementById('currentDateTime').textContent = formattedDateTime;
        }
        setInterval(updateDateTime, 1000); 
        updateDateTime(); 
    </script>
</body>
</html>

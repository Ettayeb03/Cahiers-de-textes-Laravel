<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Cahiers de Texte</title>
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
            <a href="{{ route('home') }}">Accueil</a>
        </div>
        <div class="welcome-message">
            Bonjour, {{ $prof->firstname }} {{ $prof->lastname }}
        </div>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Se déconnecter</button>
        </form>
    </div>

    <div class="main-content">
        <h1>Historique des Cahiers de Texte</h1>

        <!-- Table -->
        @if ($cahiers->isEmpty())
            <p>Aucun cahier de texte disponible.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Groupe</th>
                        <th>Filière</th>
                        <th>Contenu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cahiers as $cahier)
                        <tr>
                            <td>{{ $cahier->date }}</td>
                            <td>{{ $cahier->heure }}</td>
                            <td>{{ $cahier->groupe->nom_grp }}</td>
                            <td>{{ $cahier->filiere->nom_fil }}</td>
                            <td>{{ $cahier->contenu }}</td>
                            <td>
                                <!-- Bouton Modifier -->
                                <form action="{{ route('cahiers.edit', $cahier->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="edit-btn">Modifier</button>                
                                </form>

                            
                                <!-- Formulaire Supprimer -->
                                <form action="{{ route('cahiers.destroy', $cahier->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cahier ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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

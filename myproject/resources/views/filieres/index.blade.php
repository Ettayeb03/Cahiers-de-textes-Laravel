<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Liste des Filières</h1>

        <!-- Afficher les messages de succès ou erreur -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Bouton pour ajouter une nouvelle filière -->
        <a href="{{ route('filieres.create') }}" class="btn btn-primary mb-3">Ajouter une Filière</a>

        <!-- Table pour afficher la liste des filières -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Année</th>
                    <th>Nombre de groupes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($filieres as $filiere)
                    <tr>
                        <td>{{ $filiere->id }}</td>
                        <td>{{ $filiere->nom_fil }}</td>
                        <td>{{ $filiere->annee }}</td>
                        <td>{{ $filiere->nombre_de_groupes }}</td>
                        
                        <td>
                            <a href="{{ route('filieres.edit', $filiere->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune filière trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Groupes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Liste des Groupes</h1>

        @if(session('success')) 
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error')) 
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('groupes.create') }}" class="btn btn-primary mb-3">Ajouter un Groupe</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Année</th>
                    <th>Nom du Groupe</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groupes as $groupe)
                    <tr>
                        <td>{{ $groupe->id }}</td>
                        <td>{{ $groupe->annee }}</td>
                        <td>{{ $groupe->nom_grp }}</td>
                        <td>{{ $groupe->filiere->nom_fil ?? 'Non attribuée' }}</td>
                        </td>
                        <td>
                            <!-- Actions de modification et suppression -->
                            <a href="{{ route('groupes.edit', $groupe->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('groupes.destroy', $groupe->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

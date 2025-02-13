<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Professeurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Liste des professeurs</h2>

    <!-- Bouton pour ajouter un professeur -->
    <a class="btn btn-primary" href="{{ route('profs.create') }}" role="button">Ajouter un professeur</a>

    <!-- Affichage des messages de succès -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table pour afficher les professeurs -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Numéro de téléphone</th>
                <th>Mot de passe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profs as $prof)
                <tr>
                    <td>{{ $prof->id }}</td>
                    <td>{{ $prof->firstname }}</td>
                    <td>{{ $prof->lastname }}</td>
                    <td>{{ $prof->email }}</td>
                    <td>{{ $prof->phone }}</td>
                    <td>{{ $prof->password }}</td>
                    <td>
                        <!-- Lien Modifier -->
                        <a class="btn btn-success" href="{{ route('profs.edit', $prof->id) }}" role="button">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('profs.destroy', $prof->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</button>
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

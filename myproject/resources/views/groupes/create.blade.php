<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Groupe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Ajouter un Groupe</h2>

    <!-- Afficher les messages de succès ou erreur -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('groupes.store') }}" method="POST">
        @csrf

        <!-- Champ Numéro du Groupe -->
        <div class="mb-3">
            <label for="nom_grp" class="form-label">Nom du Groupe</label>
            <input type="text" class="form-control" id="nom_grp" name="nom_grp" value="{{ old('nom_grp') }}" required>
        </div>

        <!-- Champ Année -->
        <div class="mb-3">
            <label for="annee" class="form-label">Année</label>
            <input type="text" class="form-control" id="annee" name="annee" value="{{ old('annee') }}" required>
        </div>

        <!-- Sélectionner la Filière -->
        <div class="mb-3">
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


        <!-- Bouton Ajouter -->
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

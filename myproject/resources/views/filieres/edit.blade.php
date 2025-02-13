<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Filière</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Modifier une Filière</h2>
    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Champ Nom de la Filière -->
        <div class="mb-3">
            <label for="nom_fil" class="form-label">Nom de la Filière</label>
            <input type="text" class="form-control" id="nom_fil" name="nom_fil" value="{{ old('nom_fil', $filiere->nom_fil) }}" required>
        </div>

        <!-- Champ Année -->
        <div class="mb-3">
            <label for="annee" class="form-label">Année</label>
            <input type="number" class="form-control" id="annee" name="annee" value="{{ old('annee', $filiere->annee) }}" required>
        </div>

        <!-- Champ Nombre de Groupes -->
        <div class="mb-3">
            <label for="nombre_de_groupes" class="form-label">Nombre de Groupes</label>
            <input type="number" class="form-control" id="nombre_de_groupes" name="nombre_de_groupes" value="{{ old('nombre_de_groupes', $filiere->nombre_de_groupes) }}" required>
        </div>


        <!-- Bouton Mettre à jour -->
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

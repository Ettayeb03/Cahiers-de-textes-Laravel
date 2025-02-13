<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Ajouter un Nouveau Module</h1>

        <form action="{{ route('modules.store') }}" method="POST">
            @csrf

            <!-- Nom du Module -->
            <div class="mb-3">
                <label for="name" class="form-label">Nom du module</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <!-- Sous-Modules -->
            <div class="mb-3">
                <label for="submodules" class="form-label">Sous-modules (séparés par des virgules)</label>
                <input type="text" name="submodules" class="form-control" id="submodules" >
            </div>

            <!-- Coefficient -->
            <div class="mb-3">
                <label for="coefficient" class="form-label">Coefficient</label>
                <input type="number" name="coefficient" class="form-control" id="coefficient" step="0.1" min="0" required>
            </div>




            <button type="submit" class="btn btn-primary">Créer</button>
        </form>

        <a href="{{ route('modules.index') }}" class="btn btn-secondary mt-3">Retour à la liste des modules</a>
    </div>
</body>
</html>

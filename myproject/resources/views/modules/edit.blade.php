<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Modifier un module</h2>
    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nom du module -->
        <div class="mb-3">
            <label for="name" class="form-label">Nom du module</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $module->name) }}" required>
        </div>

        <!-- Sous-modules -->
        <div class="mb-3">
            <label for="submodules" class="form-label">Sous-modules</label>
            <input type="text" class="form-control" id="submodules" name="submodules" value="{{ old('submodules', $module->submodules) }}">
        </div>

        <!-- Coefficient -->
        <div class="mb-3">
            <label for="coefficient" class="form-label">Coefficient</label>
            <input type="number" class="form-control" id="coefficient" name="coefficient" value="{{ old('coefficient', $module->coefficient) }}" step="0.1" min="0" required>
        </div>
        

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - EMSI')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Menu de navigation ici -->
        </nav>
    </header>

    <main class="container">
        @yield('content') <!-- Le contenu des pages sera injecté ici -->
    </main>

    <footer>
        <!-- Pied de page -->
    </footer>

</body>
</html>

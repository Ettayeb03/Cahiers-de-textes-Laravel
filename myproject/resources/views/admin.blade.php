@extends('layouts.app') 

@section('content')

<!-- Logo de l'application -->
<div class="logo my-4">
    <img src="{{ asset('images/logoemsi.png') }}" alt="EMSI" class="logo-img">
</div>

<!-- Contenu principal -->
<div class="container">
    <h2 class="main-content text-center">Bienvenue, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} dans la section administration.</h2>
    
    <!-- Menu -->
    <div class="menu d-flex justify-content-center flex-wrap">

        <!-- Lien Profs -->
        <a href="{{ route('profs.index') }}" class="menu-item">
            <img src="https://www.bing.com/th?id=OIP.bSr8RLEh52uPYdMiQvPYnAHaHa&w=150&h=150&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="Professeurs" class="menu-icon">
            <span>Professeurs</span>
        </a>

        <!-- Lien Modules -->
        <a href="{{ route('modules.index') }}" class="menu-item">
            <img src="https://img.freepik.com/vecteurs-premium/icone-livre-etude-vecteur-plat-reponse-examen-formulaire-verification-isole_98396-63654.jpg" alt="Modules" class="menu-icon">
            <span>Modules</span>
        </a>

        <!-- Lien Groupes -->
        <a href="{{ route('groupes.index') }}" class="menu-item">
            <img src="https://www.bing.com/th?id=OIP.-HA9suJjACqPZjH1go-11AAAAA&w=150&h=150&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="Groupes" class="menu-icon">
            <span>Groupes</span>
        </a>

        <!-- Lien Filières -->
        <a href="{{ route('filieres.index') }}" class="menu-item">
            <img src="https://th.bing.com/th/id/OIP.QIK_egz6o41Zf9Btyso8ngAAAA?pid=ImgDet&w=191&h=191&c=7" alt="Filières" class="menu-icon">
            <span>Filières</span>
        </a>

    </div>
</div>

@endsection

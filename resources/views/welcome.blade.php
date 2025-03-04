@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<!-- Page d'accueil-->

    <header class="py-5 bg-light  mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenue sur l'application du Collège Maisonneuve !</h1>
                <p class="lead mb-0">Nous avons créé cette plateforme pour que les étudiants du Collège Maisonneuve puissent fournir leurs informations personnelles de manière rapide, sécurisée et efficace. Vos données sont essentielles pour améliorer nos services et garantir une meilleure communication avec notre communauté étudiante.</p>
                <p class="card-text text-center lead"><small>Facilitez la gestion de vos informations en toute simplicité !</small></p>
                <a href="{{route('students.index')}}" class=" btn p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">Voir les étudiants</a>
            </div>

        </div>
    </header>

@endsection
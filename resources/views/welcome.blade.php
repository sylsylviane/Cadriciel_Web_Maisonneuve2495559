@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<!-- Page d'accueil-->
<div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{asset('img/etudiants.jpg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Bienvenue sur l'application du Collège Maisonneuve !</h1>
            <p class="lead">Nous avons créé cette plateforme pour que les étudiants du Collège Maisonneuve puissent fournir leurs informations personnelles de manière rapide, sécurisée et efficace. Vos données sont essentielles pour améliorer nos services et garantir une meilleure communication avec notre communauté étudiante.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('students.index')}}" class="btn p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">Voir les étudiants</a>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
            </div>
        </div>
    </div>
</div>
@endsection
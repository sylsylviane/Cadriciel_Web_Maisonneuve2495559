@extends('layouts.app')
@section('title', trans('Fichier'))
@section('content')
<!-- FIL D'ARIANE -->
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item"><a href="{{route('file.index')}}" class="text-dark text-decoration-none">@lang('Fichier')</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $fichier->title ? $fichier->title[app()->getLocale()] ?? $fichier->title['fr'] : '' }}</li>
        </ol>
    </nav>
</div>
<!-- AFFICHAGE DU FICHIER -->
<div class="col-md-10 m-auto">
    <div class="card text-center border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-end">
            <a href="{{route('file.index')}}" aria-label="close"><i class="bi bi-x-square" style="font-size: 1.5rem; color:black"></i></a>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>@lang('Titre'): </strong>{{ $fichier->title ? $fichier->title[app()->getLocale()] ?? $fichier->title['fr'] : '' }}</p>
            <p class="card-text mb-1"><strong>@lang('Date'): </strong>{{ $fichier->created_at }}</p>
            <p class="card-text mb-1"><strong>@lang('Auteur'): </strong>{{ $fichier->user->name }}</p>

            <!-- Afficher les fichiers PDF -->
            @if(str_ends_with($fichier->fichierUrl(), '.pdf'))
            <iframe
                src="{{ $fichier->fichierUrl() }}"
                class="embed-responsive-item border rounded shadow-sm"
                width="100%"
                height="1000px"
                frameborder="0"> 
            </iframe>

            <!-- Lien pour les fichiers Word -->
            @elseif(str_ends_with($fichier->fichierUrl(), '.doc') || str_ends_with($fichier->fichierUrl(), '.docx'))
            <a href="{{ $fichier->fichierUrl() }}" class="btn btn-primary" target="_blank">
                @lang('Télécharger le fichier Word')
            </a>
            <!-- Lien pour les fichiers ZIP -->
            @elseif(str_ends_with($fichier->fichierUrl(), '.zip'))
            <a href="{{ $fichier->fichierUrl() }}" class="btn btn-primary" target="_blank">
                @lang('Télécharger le fichier ZIP')
            </a>
            @endif
        </div>

        @if($fichier->user_id == auth()->user()->id)
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{route('file.edit', $fichier->id)}}" aria-label="edit"><i class="bi bi-pencil-square" style="font-size: 1.5rem; color: green"></i></a>
                <button type="button" class="btn btn-sm btn-outline-*" data-bs-toggle="modal" data-bs-target="#deleteModal" aria-label="delete">
                    <i class="bi bi-trash3 telx" style="font-size: 1.5rem; color:red"></i>
                </button>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- MODALE -->
<div class="modal fade " tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                @lang('lang.texte_modale_suppression')
            </div>
            <div class="modal-footer flex-nowrap p-0 ">
                <form method="POST" class="m-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 "><strong class="text-danger">@lang('Supprimer')</strong></button>
                </form>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-start" data-bs-dismiss="modal">@lang('Annuler')</button>
            </div>
        </div>
    </div>
</div>
@endsection
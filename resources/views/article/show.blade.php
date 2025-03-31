@extends('layouts.app')
@section('title', trans('Articles'))
@section('content')
<!-- FIL D'ARIANE -->
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item"><a href="{{route('article.index')}}" class="text-dark text-decoration-none">@lang('Article')</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $article->title ? $article->title[app()->getLocale()] ?? $article->title['fr'] : '' }}</li>
        </ol>
    </nav>
</div>
<!-- AFFICHAGE DES INFORMATIONS DE L'ARTICLE -->
<div class="col-md-6 m-auto">
    <div class="card text-center border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-end">
            <a href="{{route('article.index')}}" aria-label="close"><i class="bi bi-x-square" style="font-size: 1.5rem; color:black"></i></a>
        </div>
        <div class=" card-body">
            <h5>{{ $article->title ? $article->title[app()->getLocale()] ?? $article->title['fr'] : '' }}</h5>
            <p class="card-text mb-1"><strong>@lang('Contenu'): </strong>{{ $article->content ? $article->content[app()->getLocale()] ?? $article->content['fr'] : '' }}</p>
            <p class="card-text mb-1"><strong>@lang('Date'): </strong>{{ $article->created_at }}</p>
            <p class="card-text mb-1"><strong>@lang('Auteur'): </strong>{{ $article->user_id }}</p>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{route('article.edit', $article->id)}}" aria-label="edit"><i class="bi bi-pencil-square" style="font-size: 1.5rem; color: green"></i></a>
                <button type="button" class="btn btn-sm btn-outline-*" data-bs-toggle="modal" data-bs-target="#deleteModal" aria-label="delete">
                    <i class="bi bi-trash3 telx" style="font-size: 1.5rem; color:red"></i>
                </button>
            </div>
        </div>
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
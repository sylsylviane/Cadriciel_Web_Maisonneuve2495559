@extends('layouts.app')
@section('title', trans('Articles'))
@section('content')

<!-- FIL D'ARIANE -->
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">@lang('Articles')</li>
        </ol>
    </nav>
</div>
<div class="mx-5 mb-2 px-4 d-flex justify-content-end">
    <!-- SI AJOUT DE PAGINATION, AJOUTER OBJET ARTICLE -->
</div>
<!-- CONTENU -->
<div class="row mx-5">

    @foreach($articles as $article)
    <div class="col-lg-6">
        <div class="card text-center border-0 shadow rounded-0 p-4 m-2">
            <div class="card-header icon">
                <i class="bi bi-newspaper" style="font-size: 1.5rem"></i>
            </div>
            <div class=" card-body">
                <h5 class="card-title">{{ $article->title ? $article->title[app()->getLocale()] ?? $article->title['fr'] : '' }}</h5>
                <p class="card-text mb-1"><strong>@lang('Contenu'): </strong>{{ $article->content ? $article->content[app()->getLocale()] ?? $article->content['fr'] : '' }}</p>
                <p class="card-text mb-1"><strong>@lang('Date'): </strong>{{ $article->created_at }}</p>
                <p class="card-text mb-1"><strong>@lang('Auteur'): </strong>{{ $article->user->name }}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="{{route('article.show', $article->id)}}" class="btn btn-sm px-5 py-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">@lang('Voir')</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="mx-5 mt-4 px-4">
    <!-- SI AJOUT DE PAGINATION, AJOUTER OBJET ARTICLE -->
</div>
@endsection
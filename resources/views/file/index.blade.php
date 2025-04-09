@extends('layouts.app')
@section('title', trans('Fichiers'))
@section('content')

<!-- FIL D'ARIANE -->
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">@lang('Fichiers')</li>
        </ol>
    </nav>
</div>
<div class="col-md-6 m-auto">
    <table class="table table-striped table-hover table-bordered table-md text-center">
        <thead>
            <tr>
                <th>@lang('Titre')</th>
                <th>@lang('Nom de l\'étudiant')</th>
                <th>@lang('Fichier')</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($fichiers as $fichier)
            <tr>
                <td>{{ $fichier->title ? $fichier->title[app()->getLocale()] ?? $fichier->title['fr'] : '' }}</td>
                <td>{{ $fichier->user->name }}</td>
                <td><a href="{{ route('file.show', $fichier->id) }}">@lang('Voir le fichier')</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    {{ $fichiers }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
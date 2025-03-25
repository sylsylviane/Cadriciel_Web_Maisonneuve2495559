@extends('layouts.app')
@section('title', 'Étudiants')
@section('content')
<!-- FIL D'ARIANE -->
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="text-dark text-decoration-none">Étudiants</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $student->name }}</li>
        </ol>
    </nav>
</div>
<!-- AFFICHAGE DES INFORMATIONS DE L'ÉTUDIANT -->
<div class="col-md-6 m-auto">
    <div class="card text-center border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-end">
            <a href="{{route('students.index')}}" aria-label="close"><i class="bi bi-x-square" style="font-size: 1.5rem; color:black"></i></a>
        </div>
        <div class=" card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text mb-1"><strong>@lang('Adresse'): </strong>{{ $student->address }}</p>
            <p class="card-text mb-1"><strong>@lang('Téléphone'): </strong>{{ $student->phone }}</p>
            <p class="card-text mb-1"><strong>@lang('Courriel'): </strong>{{ $student->email }}</p>
            <p class="card-text mb-1"><strong>@lang('Date de naissance'): </strong>{{ $student->dob }}</p>
            <p class="card-text mb-1"><strong>@lang('Ville'): </strong>{{ $student->city->name }}</p>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{route('student.edit', $student->id)}}" aria-label="edit"><i class="bi bi-pencil-square" style="font-size: 1.5rem; color: green"></i></a>
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
                <h5 class="mb-0">Êtes-vous sûr de vouloir supprimer cet étudiant ?</h5>
                <p class="mb-0">Cette action est irréversible.</p>
            </div>
            <div class="modal-footer flex-nowrap p-0 ">
                <form method="POST" class="m-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 "><strong class="text-danger">Supprimer</strong></button>
                </form>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-start" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
@endsection
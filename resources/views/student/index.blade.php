@extends('layouts.app')
@section('title', 'Étudiants')
@section('content')
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Étudiants</li>
        </ol>
    </nav>
</div>
<div class="mx-5 mb-2 px-4 d-flex justify-content-end">
    {{$students}}
</div>
<!-- Page content-->
<div class="row mx-5">
    @foreach($students as $student)
    <div class="col-lg-6">
        <div class="card text-center border-0 shadow rounded-0 p-4 m-2">
            <div class="card-header icon">
                <i class="bi bi-backpack" style="font-size: 1.5rem"></i>
            </div>
            <div class=" card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                <p class="card-text mb-1"><strong>Adresse: </strong>{{ $student->address }}</p>
                <p class="card-text mb-1"><strong>Téléphone: </strong>{{ $student->phone }}</p>
                <p class="card-text mb-1"><strong>Courriel: </strong>{{ $student->email }}</p>
                <p class="card-text mb-1"><strong>Date de naissance: </strong>{{ $student->dob }}</p>
                <p class="card-text mb-1"><strong>Ville: </strong>{{ $student->city->name }}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="{{route('student.show', $student->id)}}" class="btn btn-sm px-5 py-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">Voir</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="mx-5 mt-4 px-4">
    {{$students}}
</div>
@endsection
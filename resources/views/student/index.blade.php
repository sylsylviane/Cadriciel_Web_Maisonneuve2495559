@extends('layouts.app')
@section('title', 'Étudiants')
@section('content')
<!-- Page content-->
<div class="row m-5">
    @foreach($students as $student)
    <div class="col-4">
        <div class="card text-center border-0 shadow rounded-0 p-4 m-3">
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
                    <a href="{{route('student.show', $student->id)}}" class="btn btn-sm btn-outline-primary">Voir</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
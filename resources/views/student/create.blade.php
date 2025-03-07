@extends('layouts.app')
@section('title', 'Créer un étudiant')
@section('content')
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark fw-semibold text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un étudiant</li>
        </ol>
    </nav>
</div>

<div class="col-lg-6 col-md-8 col-sm-10 m-auto my-5">
    <div class="card border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-center">
            <h2>Ajouter un étudiant</h2>
            <i class="bi bi-person-lines-fill" style="font-size:1.5rem"></i>
        </div>
        <div class=" card-body">
            <form action="{{route('student.store')}}" method="POST">
                @csrf

                <label for="name" class="form-label">Nom</label>
                <input id="name" name="name" value="{{old('name')}}" class="form-control mb-3" type="text">
                @if($errors->has('name'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('name')}}
                </div>
                @endif

                <label for="address" class="form-label">Adresse</label>
                <input id="address" name="address" value="{{old('address')}}" class="form-control mb-3" type="text">
                @if($errors->has('address'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('address')}}
                </div>
                @endif

                <label for="phone" class="form-label">Téléphone</label>
                <input id="phone" name="phone" value="{{old('phone')}}" class=" form-control mb-3" type="text">
                @if($errors->has('phone'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('phone')}}
                </div>
                @endif

                <label for="email" class="form-label">Courriel</label>
                <input id="email" name="email" value="{{old('email')}}" class=" form-control mb-3" type="email">
                @if($errors->has('email'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('email')}}
                </div>
                @endif

                <label for="dob" class="form-label">Date de naissance</label>
                <input id="dob" name="dob" value="{{old('dob')}}" class=" form-control mb-3" type="date">
                @if($errors->has('dob'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('dob')}}
                </div>
                @endif

                <label for="city">Ville</label>
                <select id="city" class="form-select mb-3" name="city_id">
                    <option value="">Sélectionner une ville</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" @if ($city->id == old('city_id')) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('city_id'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('city_id')}}
                </div>
                @endif
        </div>
        <div class="card-footer">
            <div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                    <a href="{{route('students.index')}}" class="btn btn-secondary">Annuler</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
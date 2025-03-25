@extends('layouts.app')
@section('title', trans('Modifier un étudiant'))
@section('content')
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="text-dark text-decoration-none">@lang('Étudiants')</a></li>
            <li class="breadcrumb-item"><a href="{{route('student.show', $student->id)}}" class="text-dark text-decoration-none">{{ $student->name }}</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">@lang('Modifier un étudiant')</li>
        </ol>
    </nav>
</div>
<div class="col-lg-6 col-md-8 col-sm-10 m-auto my-5">
    <div class="card border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-center">
            <h2>@lang('Modifier un étudiant')</h2>
            <i class="bi bi-person-lines-fill" style="font-size:1.5rem"></i>
        </div>
        <div class=" card-body">
            <form method="POST">
                @csrf
                @method('PUT')
                <label for="name" class="form-label">@lang('Nom')</label>
                <input id="name" name="name" value="{{old('name', $student->name)}}" class="form-control mb-3" type="text">
                @if($errors->has('name'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('name')}}
                </div>
                @endif

                <label for="address" class="form-label">@lang('Adresse')</label>
                <input id="address" name="address" value="{{old('address', $student->address)}}" class="form-control mb-3" type="text">
                @if($errors->has('address'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('address')}}
                </div>
                @endif

                <label for="phone" class="form-label">@lang('Téléphone')</label>
                <input id="phone" name="phone" value="{{old('phone', $student->phone)}}" class=" form-control mb-3" type="text">
                @if($errors->has('phone'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('phone')}}
                </div>
                @endif

                <label for="email" class="form-label">@lang('Courriel')</label>
                <input id="email" name="email" value="{{old('email', $student->email)}}" class=" form-control mb-3" type="email">
                @if($errors->has('email'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('email')}}
                </div>
                @endif

                <label for="dob" class="form-label">@lang('Date de naissance')</label>
                <input id="dob" name="dob" value="{{old('dob', $student->dob)}}" class=" form-control mb-3" type="date">
                @if($errors->has('dob'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('dob')}}
                </div>
                @endif

                <label for="city">@lang('Ville')</label>
                <select id="city" class="form-select mb-3" name="city_id">
                    <option value="">@lang('Sélectionner une ville')</option>
                    @foreach($cities as $city)
                    <option value="{{$student->city->id}}" @if($student->city->id == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('city_id'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('city_id')}}
                </div>
                @endif
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">@lang('Modifier')</button>
                <a href="{{route('student.show', $student->id)}}" class="btn btn-secondary">@lang('Annuler')</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
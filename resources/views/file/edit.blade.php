@extends('layouts.app')
@section('title', trans('Modifier un fichier'))
@section('content')
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">@lang('Modifier un fichier')</li>
        </ol>
    </nav>
</div>

<div class="col-lg-6 col-md-8 col-sm-10 m-auto my-5">
    <div class="card border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-center">
            <h2>@lang('Modifier un fichier')</h2>
            <i class="bi bi-journal-plus" style="font-size:1.5rem"></i>
        </div>
        <div class=" card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="mb-3">
                    <legend>@lang('Fichier en français')</legend>
                    <label for="title" class="form-label">@lang('Titre')</label>
                    <input id="title" name="title_fr" value="{{old('title_fr', $fichier->title['fr'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('title_fr'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('title_fr')}}
                    </div>
                    @endif 
                </fieldset>

                <fieldset class="mb-3">
                    <legend>@lang('Fichier en anglais')</legend>
                    <label for="title" class="form-label">@lang('Titre')</label>
                    <input id="title" name="title_en" value="{{old('title_en', $fichier->title['en'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('title_en'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('title_en')}}
                    </div>
                    @endif
                </fieldset>

                <label for="file_path" class="form-label">@lang('Télécharger un fichier')</label>
                <input id="file_path" name="file_path" class="form-control mb-3" type="file">
                @if($errors->has('file_path'))
                <div class="alert alert-warning p-1">
                    {{$errors->first('file_path')}}
                </div>
                @endif
        </div>
        <div class="card-footer">
            <div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">@lang('Sauvegarder')</button>
                    <a href="{{route('file.index')}}" class="btn btn-secondary">@lang('Annuler')</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
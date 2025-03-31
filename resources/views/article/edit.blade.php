@extends('layouts.app')
@section('title', trans('Modifier un article'))
@section('content')
<div class=" mx-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}" class="text-dark text-decoration-none">@lang('Accueil')</a></li>
            <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="text-dark text-decoration-none">@lang('Article')</a></li>
            <li class="breadcrumb-item"><a href="{{route('article.show', $article->id)}}" class="text-dark text-decoration-none">{{ $article->title ? $article->title[app()->getLocale()] ?? $article->title['fr'] : '' }}</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">@lang('Modifier un article')</li>
        </ol>
    </nav>
</div>
<div class="col-lg-6 col-md-8 col-sm-10 m-auto my-5">
    <div class="card border-0 shadow rounded-0 p-4 m-5">
        <div class="card-header icon text-center">
            <h2>@lang('Modifier un article')</h2>
            <i class="bi bi-pencil-square" style="font-size:1.5rem"></i>
        </div>
        <div class=" card-body">
            <form method="POST">

                <!-- TODO: -->
                @csrf
                @method('PUT')
                <fieldset class="mb-3">
                    <legend>@lang('Article en français')</legend>
                    <label for="title" class="form-label">@lang('Titre')</label>
                    <input id="title" name="title_fr" value="{{old('title_fr', $article->title['fr'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('title_fr'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('title_fr')}}
                    </div>
                    @endif

                    <label for="content" class="form-label">@lang('Contenu')</label>
                    <input id="content" name="content_fr" value="{{old('content_fr', $article->content['fr'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('content_fr'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('content_fr')}}
                    </div>
                    @endif
                </fieldset>

                <fieldset class="mb-3">
                    <legend>@lang('Article en anglais')</legend>
                    <label for="title" class="form-label">@lang('Titre')</label>
                    <input id="title" name="title_en" value="{{old('title_en', $article->title['en'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('title_en'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('title_en')}}
                    </div>
                    @endif

                    <label for="content" class="form-label">@lang('Contenu')</label>
                    <input id="content" name="content_en" value="{{old('content_en', $article->content['en'])}}" class="form-control mb-3" type="text">
                    @if($errors->has('content_en'))
                    <div class="alert alert-warning p-1">
                        {{$errors->first('content_en')}}
                    </div>
                    @endif
                </fieldset>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">@lang('Modifier')</button>
                <a href="{{route('article.show', $article->id)}}" class="btn btn-secondary">@lang('Annuler')</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
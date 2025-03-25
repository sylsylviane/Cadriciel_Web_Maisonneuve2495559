@extends('layouts.app')
@section('title', trans('Accueil'))
@section('content')

<!-- Page d'accueil-->
<div class="container-fluid mx-auto">
    <div class="row flex-lg-row-reverse align-items-center g-3 py-5 mx-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{asset('img/etudiants.jpg')}}" class="d-block mx-lg-auto img-fluid w-100" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">@lang('lang.bienvenue_titre')"</h1>
            @lang('lang.accueil_paragraphe')
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('students.index')}}" class="btn p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">@lang('lang.texte_bouton')</a>
            </div>
        </div>
    </div>
</div>
@endsection
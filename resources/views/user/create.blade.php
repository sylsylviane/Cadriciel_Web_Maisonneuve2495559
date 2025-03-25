@extends('layouts.app')
@section('title', trans('S\'inscrire'))
@section('content')
<div class="form-signin w-100 m-auto mt-5" style="max-width: 330px;">
    <!-- TODO: AFFICHER LES ERREURS DE VALIDATION, LES OLD VALUE ET NAME -->
    <form method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">@lang('Connexion')</h1>
        <div class="form-floating ">
            <input name="name" type="text" class="form-control rounded-bottom-0" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">@lang('Nom d\'utilisateur')</label>
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">@lang('Courriel')</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">@lang('Mot de passe')</label>
        </div>
        <div class="form-floating">
            <input name="password_confirmation" type="password" class="form-control rounded-top-0" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">@lang('Confirmer le mot de passe')</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                @lang('Se souvenir de moi')
            </label>
        </div>
        <button class="btn px-3 py-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" style="min-width: 330px;">@lang('Se connecter')</button>
    </form>
</div>
@endsection
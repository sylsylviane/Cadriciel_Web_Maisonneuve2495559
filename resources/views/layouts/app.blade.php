<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
@php $locale = session()->get('locale'); @endphp

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded p-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarSupportedContent">
                <a class="navbar-brand col-lg-3 me-0" href="{{route('accueil')}}">{{ config('app.name' )}}</a>

                <ul class="navbar-nav col-lg-6 justify-content-lg-center flex-grow-1">
                    <li class="nav-item"><a class="nav-link" href="{{route('accueil')}}">@lang('Accueil')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('articles.index')}}">@lang('lang.consulter_forum')</a></li>
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{route('students.index')}}">@lang('Étudiants')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('student.create')}}">@lang('Ajouter un étudiant')</a></li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">@lang('Langage') {{ $locale == '' ? '' : "($locale)" }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('langue', 'fr') }}">@lang('Français')</a></li>
                            <li><a class="dropdown-item" href="{{ route('langue', 'en') }}">@lang('Anglais')</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end gap-3">
                    @guest
                    <a href="{{ route('login') }}" class="nav-link btn px-2 py-1 text-primary-emphasis border border-primary-subtle rounded-3">@lang('Connexion')</a>
                    @else
                    <a href="{{ route('logout') }}" class="nav-link btn px-2 py-1 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">@lang('Deconnexion')</a>
                    @endguest
                    <a href="{{ route('user.create') }}" class="nav-link btn px-2 py-1 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">@lang('S\'inscrire')</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENU -->
    <main class="flex-grow-1">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @yield('content')
    </main>

    <!-- FOOTER-->
    <footer class="py-4 border-top mt-5">
        <p class="text-center text-body-secondary">@lang('lang.texte_pied_de_page') &copy; {{ config('app.name')}} - {{date('Y')}}</p>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="module" src="{{ asset('/js/app.js') }}"></script>

</html>
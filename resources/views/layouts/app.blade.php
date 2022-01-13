<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                        <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                        @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                @if(Auth::user()->roles()->first()->slug == "developer")
                                    <li class="nav-item">
                                        <a href="{{ route('user.index') }}" class="nav-link">Utilisateur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('status.index') }}" class="nav-link">Status</a>
                                    </li>
                                    @endif
                            @if(Auth::user()->roles()->first()->slug == "manager")

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Prospects</a>

                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">

                                            <li>
                                                <a class="dropdown-item" href="{{ route('manager.prospect.index') }}">
                                                    {{ __('Liste') }}
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                            @endif
                                    @if((Auth::user()->roles()->first()->slug == "agent") || (Auth::user()->roles()->first()->slug == "manager"))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Rendez-vous</a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    @if(Auth::user()->roles()->first()->slug == "agent")
                                    <li>
                                        <a class="dropdown-item" href="{{ route('agent.prospect.create') }}">
                                            {{ __('Ajouter RDV') }}
                                        </a>
                                    </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('agent.rdv.index') }}">
                                                {{ __('Liste RDV') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->roles()->first()->slug == "manager")
                                    <li>
                                        <a class="dropdown-item" href="{{ route('manager.rdv.index') }}">
                                            {{ __('Liste RDV') }}
                                        </a>
                                    </li>
                                    @endif
                                        @endif
                                </ul>
                            </li>
                             </ul>



                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle"></i>   {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="bi-x-square-fill"></i> {{ __('Se déconnecter') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
                @endguest
            </div>
            </div>
        </nav>


        <main class="py-4">

            @yield('content')
        </main>
    </div>
@yield('scripts')
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

</body>
</html>

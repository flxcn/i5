<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" defer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href=@guest{{ url('/') }}@else{{ url('/home') }} @endguest>
                    {{ config('app.name', 'i5') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto justify-content-end">
                        @auth
                            @include('partials._search')

                            <li class="nav-item dropdown ms-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Resources
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ __('messages.i5_guide_url')}}" target="_blank">User Guide</a></li>
                                    <li><a class="dropdown-item" href="{{ __('messages.wiki_url')}}" target="_blank">SCAS Wiki</a></li>
                                    <li><a class="dropdown-item" href="{{ __('messages.office_guide_url')}}" target="_blank">Office Guide</a></li>
                                </ul>
                            </li>

                            @can('manage users')
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="/users">
                                  Manage Users
                                </a>
                            </li>
                            @endcan
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- Sticking to the bottom when there is not enough text. But not getting pushed down when there is enough text. --}}
    <footer class="footer mt-auto py-3 bg-light" style="position: relative; bottom: 10px; width: 100%;">
        <div class="container">
          <span class="text-muted">Disclaimer: For informational purposes only. The members of the Small Claims Advisory Service are undergraduate students at Harvard College, and are not lawyers. No aspect of this system is designed or intended to dispense legal advice; any actions you may choose to take or not to take in or out of court are at your own discretion.</span>
        </div>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bean to Brew</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{ URL('images/Bean-to-Brew.png') }}" alt="Logo" width="50" height="50" >
                <a class="navbar-brand" href="{{ route('home') }}">
                    Bean to Brew
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
                        @if (auth()->user()->role !== 'regular')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('farmschedule') }}">{{ __('Schedule') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('coffeeinventory') }}">{{ __('Inventory') }}</a>
                                </li>
                        @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('locationmapping') }}">{{ __('Locations') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('speciesidentifier') }}">{{ __('Species Identifier') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('growcoffee') }}">{{ __('Grow Coffee') }}</a>
                            </li>
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

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <form class="form-inline" onsubmit="return submitForm();">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ratings') }}">{{ __('Ratings') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shopping') }}">{{ __('Buy/Sell') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                    </a> 
                                        
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
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav id="ms-main-nav" class="navbar shadow-sm fixed-top navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <h1>Deliveboo</h1>
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>
                @guest
                <a class="text-decoration-none text-dark dropdown-item me-3 text-end" href="http://localhost:5173/">
                    Area utenti
                </a>
                @endguest


                @auth
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="list-unstyled m-0 d-none d-md-flex">
                        <li class="me-3">
                            <a onclick="loadingPage()" class="text-decoration-none text-dark"
                                href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a class="text-decoration-none text-dark me-3"
                                href="{{ route('admin.orders.index') }}">Ordini</a>
                        </li>
                        <li>
                            <a class="text-decoration-none text-dark" href="{{ route('admin.foods.index') }}">Il tuo
                                menù</a>
                        </li>

                    </ul>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">


                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown">

                                <div class="dropdown-menu-right fs-5 d-md-flex" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-md-none"
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>

                                    <a class="dropdown-item d-md-none"
                                        href="{{ route('admin.orders.index') }}">{{ __('Ordini') }}</a>

                                    <a class="dropdown-item d-md-none"
                                        href="{{ route('admin.foods.index') }}">{{ __('Il tuo menù') }}</a>

                                     
                                    <a class="text-decoration-none text-dark dropdown-item me-3" href="http://localhost:5173/">
                                        Area utenti
                                    </a>
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>


                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                    {{-- <a class="dropdown-item hover-dropdown"
                                            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a> --}}

                                    {{-- <a class="dropdown-item hover-dropdown" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                                            class="fa-solid fa-arrow-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a> --}}
                                    {{-- <a class="dropdown-item" href="{{route('admin.foods.index')}}">Cibi</a>
                                        <a class="dropdown-item" href="{{route('admin.foods.create')}}">Aggiungi piatto</a> --}}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    {{-- </div> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </nav>

        <main class="">
            <div class="container">
                @yield('content')
            </div>

        </main>
    </div>
</body>

</html>

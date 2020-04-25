<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    @yield('links')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm pt-0 pr-0  pb-0 sticky-top">
            <div class="container navigacija mr-0">
                <div class="logo">
                    <a class="navbar-brand ml-0" id="logo" href="{{ url('/home') }}">
                        <img class="mr-2" src="{{asset('images/logo.jpg')}}" alt="logo.jpg"> {{ config('app.name', 'AmplitudoAcademy') }}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav__custom">
                        <!-- Authentication Links -->
                        <li class="nav-item nav__custom__item pl-2 pr-2">
                            <a class="nav-link text-light" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item nav__custom__item pl-2 pr-2">
                            <a class="nav-link text-light" href="{{url('/courses')}}">Courses</a>
                        </li>
                        <li class="nav-item nav__custom__item pl-2 pr-2">
                            <a class="nav-link text-light" href="{{url('/posts')}}">Blog</a>
                        </li>
                        <li class="nav-item nav__custom__item pl-2 pr-2">
                            <a class="nav-link text-light" href="{{route('about')}}">About Us</a>
                        </li>

                        @guest
                            <li class="nav-item  nav__custom__item pl-2 pr-2">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item  nav__custom__item pl-2 pr-2">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{url('/')}}" class="dropdown-item">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

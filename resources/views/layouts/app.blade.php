<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(empty($title))
        <title>{{ config('app.name', 'Ouranos') }}</title>
    @else
        <title>{{ $title." - ".config('ouranos.sitename', config('app.name','Ouranos')) }}</title>
    @endif

    @if(!empty($css))
        <link rel="stylesheet" href="{{ asset('css/'.$css.'.css') }}">
    @endif

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <div class="container">
        <h1 class="sitename">
            <a href="{{ url('/') }}">{{ config('ouranos.sitename', config('app.name','Ouranos')) }}</a>
            <span style="font-size: 15px"> - {{ config('app.name', 'Laravel')." Ver".config('ouranos.version') }}</span>
        </h1>



        <nav class="headmenu">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Admin Console') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </nav>
    </div>
</header>

<main>
    @if(!empty($title))
        <?php $sub = empty($sub) ? config('app.name')." - Ver".config('ouranos.version') : $sub ?>
        <div class="topnavi">
            <a href="javascript:history.back()" class="backbutton">
                <img src="{{ asset('image/backkey.png') }}" alt="back">
            </a>
            <div>
                <div class="topnavititle">{{ $title }}</div>
                <div class="topnavisub">{{ $sub }}</div>
            </div>
        </div>
    @endif
    @yield('content')
</main>

<footer>

</footer>
</body>
</html>

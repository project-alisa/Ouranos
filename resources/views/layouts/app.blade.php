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
    <script src="{{ asset('js/changelang.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
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
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/idol') }}">Idol</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    @if(!empty($title))
        <?php $sub = !empty($sub) ? $sub : config('app.name')." - Ver".config('ouranos.version') ?>
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
    <div id="siteinfo">
        <div class="sitename">{{ config('ouranos.sitename') }}</div>
        <div class="appinfo">{{ config('app.name')." Ver".config('ouranos.version') }}</div>
        <p>
            <label>
                Language:
                <select id="language">
                    <option value="ja" @if(\App::isLocale('ja')) selected @endif>{{ __('locale.ja') }}</option>
                    <option value="en" @if(\App::isLocale('en')) selected @endif>{{ __('locale.en') }}</option>
                    <option value="ko" @if(\App::isLocale('ko')) selected @endif>{{ __('locale.ko') }}</option>
                </select>
            </label>
        </p>
        <div id="footlinks">
            <a href="javascript:void(0)">{{ __('About this site') }}</a>
            <a href="https://github.com/project-alisa/Ouranos" target="_blank">GitHub</a>
        </div>
    </div>
    <div id="footbanners">
        <a href="https://miyacorata.net" target="_blank" title="MiyanojiRapid">
            <img src="{{ asset('image/miyanojirapid.png') }}" alt="MiyanojiRapid">
        </a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px"
                 src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                 alt="正当なCSSです!" />
        </a>
    </div>
</footer>
</body>
</html>

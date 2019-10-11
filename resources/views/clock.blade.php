<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('ouranos.sitename',config('app.name','Ouranos')) }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/clock.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/clock.js') }}"></script>
</head>
<body>
<img src="{{ asset('image/card/'.config('ouranos.cardname').'.jpg') }}" alt="Background" id="background">
<div id="systemname">
    {{ config('app.name') }}
    <p>
        Ver {{ config('ouranos.version') }}<br>
        {{ config('ouranos.phrase') }}
    </p>
</div>

<main>
{{--    <h1><img src="{{ asset('image/ouranos_icon.png') }}" id="logo" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"></h1>--}}
    <div id="clock">
        <div id="date">0</div>
        <div id="time">0</div>
    </div>
    <div id="infos">
        <div class="info">
            <span>Inform@tion</span>
            うどんがたべたい今日このごろ
        </div>
        <div class="birth">
            <span>Happy Birthday!</span>
            今日お誕生日のアイドルはいません
        </div>
        <div>
            <span>System</span>
            <a href="{{ url('/') }}">{{ config('ouranos.sitename','MillionLivePortal') }}</a>
             - {{ config('app.name','Ouranos').' Ver'.config('ouranos.version').' ('.config('ouranos.phrase').')' }}
        </div>
    </div>
</main>


</body>
</html>

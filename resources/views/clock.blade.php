<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('ouranos.sitename',config('app.name','Ouranos')) }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/clock.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/clock.js') }}"></script>
</head>
<body>
<img src="{{ asset('image/card/'.config('ouranos.clockCardName').'.jpg') }}" alt="Background" id="background">
<div id="systemname">
    <img src="{{ asset('image/ouranos_icon.png') }}" id="logo" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"><br>
    {{ config('app.name') }}
    <p>
        Ver {{ config('ouranos.version') }}<br>
        {{ config('ouranos.phrase') }}
    </p>
</div>

<main class="{{ 'clock-'.$clock_mode }}">
    <div id="clock">
        <div id="date"></div>
        <div id="time"></div>
    </div>
    <div id="infos">
        <div class="event" title="このデータは matsurihi.me のAPI Princess を情報源としています。">
            <span>Event info</span>
            {{ $event_txt ?: 'イベント情報を取得できませんでした' }}
        </div>
        <div class="info" title="{{ config('ouranos.sitename') }}からのお知らせです。&#x0A;このお知らせは @ml_portal@mstdn.miyacorata.net でも配信しています。">
            <span>MLP info</span>
            {!! $feed_txt ?: 'お知らせを取得できませんでした' !!}
        </div>
        <div class="birth">
            <span>{{ $birth_text ? 'Happy Birthday!' : 'Birthday info' }}</span>
            {{ $birth_text ?: '今日お誕生日のアイドルはいません' }}
        </div>
        <div>
            <span>System summary</span>
            <a href="{{ url('/') }}" title="ToP!!!!!!!!!!!!!に戻る">{{ config('ouranos.sitename','MillionLivePortal') }}</a>
             - {{ config('app.name','Ouranos').' Ver'.config('ouranos.version').' ('.config('ouranos.phrase').')' }}
        </div>
    </div>
</main>

</body>
</html>

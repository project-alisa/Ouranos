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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @if(!empty($css))
        <link rel="stylesheet" href="{{ asset('css/'.$css.'.css') }}">
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/changelang.js') }}"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>

    <!-- dialog-polyfill -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.5.0/dialog-polyfill.css" integrity="sha256-hT0ET4tfm+7MyjeBepBgV2N5tOmsAVKcTWhH82jvoaA=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.5.0/dialog-polyfill.js" integrity="sha256-WhydigBhXu0MqdONU0I+csgWWPFcGAHMxDdX3fGZG6M=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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
                <li><a href="{{ url('/') }}">ToP!!!!!!!!!!!!!</a></li>
                <li><a href="{{ url('/idol') }}">Idol</a></li>
            </ul>
        </nav>
    </div>
    <div id="share_button">
        <a href="javascript:openShareWindow()" class="fedi">{{ __('Share') }}</a>
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

<dialog id="sharewindow">
    <div class="msgbox" style="width: 700px">
        <div class="msgboxtop">Share</div>
        <div class="msgboxbody">
            <h2>{{ __('messages.share.title') }}</h2>
            <div style="padding: 5px 10px 10px;text-align: center">
                <p style="margin: 10px 15px;">{{ __('messages.share.input') }}</p>
                <label>
                    <input type="search" id="sm_instance" list="mastodon_instance" placeholder="your.instance.tld" style="margin: 10px auto;display: block;width: 450px">
                </label>
                <datalist id="mastodon_instance">
                    <option value="imastodon.net">
                    <option value="imastodon.blue">
                    <option value="pawoo.net">
                    <option value="mstdn.maud.io">
                    <option value="mstdn.jp">
                    <option value="twista.283.cloud">
                    <option value="misskey.io">
                    <option value="misskey.m544.net">
                </datalist>
                <p>{{ __('messages.share.select') }}</p>
                <hr>
                <div class="buttonbox">
                    <a href="javascript:openTootWindow('imastodon.net')" class="mstdn il half">imastodon.net</a>
                    <a href="javascript:openTootWindow('imastodon.blue')" class="mstdn il half">imastodon.blue</a>
                    <a href="javascript:openTootWindow('mstdn.jp')" class="mstdn il half">mstdn.jp</a>
                    <a href="javascript:openTootWindow('mstdn.maud.io')" class="mstdn il half">mstdn.maud.io</a>
                    <a href="javascript:openTootWindow('pawoo.net')" class="mstdn il half">pawoo.net</a>
                    <a href="javascript:openTootWindow('twista.283.cloud')" class="twista il half">twista.283.cloud</a>
                    <a href="javascript:openTootWindow('misskey.io')" class="misskey il half">misskey.io</a>
                    <a href="javascript:openTootWindow('misskey.m544.net')" class="misskey il half">misskey.m544.net</a>
                </div>
                <script>
                    var sm_instance = document.getElementById('sm_instance');
                    sm_instance.addEventListener('keydown',function(event){
                        if(event.key === 'Enter'){
                            openTootWindow(sm_instance.value);
                        }
                    });
                    function openTootWindow(instance){
                        var share_text = document.title + " {{ url()->current() }}";
                        window.open("https://"+instance+"/share?text="+share_text,"_blank","width=500,height=500");
                        closeShareWindow();
                    }
                </script>
            </div>
        </div>
        <div class="msgboxfoot">
            <a href="javascript:closeShareWindow()" class="button jw">{{ __('Close') }}</a>
        </div>
    </div>
</dialog>
<script>
    var sharewindow = document.querySelector('#sharewindow');
    dialogPolyfill.registerDialog(sharewindow);
    function openShareWindow(){
        sharewindow.showModal();
    }
    function closeShareWindow(){
        sharewindow.close();
    }

    twemoji.parse(document.body);
</script>

</body>
</html>

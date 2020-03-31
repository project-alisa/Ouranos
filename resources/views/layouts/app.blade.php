<!DOCTYPE html>
@if(!empty($top_commentout))<!--
{!! str_replace('-->','- >',$top_commentout) !!}
-->@endif<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1366">

    <!-- Descriptions and OGP -->
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:sitename" content="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}">
    <meta property="og:title" content="{{ (empty($title) ? '' : $title.' - ').config('ouranos.sitename',config('app.name','Ouranos')) }}">
    <meta property="og:type" content="{{ url()->current() === config('app.url') ? 'website' : 'article' }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:description" content="{{ $description ?? config('ouranos.defaultDescription','') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ (empty($title) ? '' : $title.' - ').config('ouranos.sitename',config('app.name','Ouranos')) }}">
    <meta name="twitter:description" content="{{ $description ?? config('ouranos.defaultDescription','') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('ouranos.googleAnalytics') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('ouranos.googleAnalytics') }}');
    </script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(empty($title))
        <title>{{ config('ouranos.sitename', config('app.name', 'Ouranos')) }}</title>
    @else
        <title>{{ $title." - ".config('ouranos.sitename', config('app.name','Ouranos')) }}</title>
    @endif

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @if(!empty($css))
        <link rel="stylesheet" href="{{ asset('css/'.$css.'.css') }}">
    @endif
    @if(\App::isLocale('zh-CN'))
        <style>
            @import url('https://fonts.googleapis.com/css?family=Noto+Sans+SC:400,700&display=swap');
            body{
                font-family: 'Noto Sans SC','Open Sans','VL PGothic','Gothic A1','Segoe UI',sans-serif;
            }
        </style>
    @elseif(\App::isLocale('zh-TW'))
        <style>
            body{
                font-family: 'Noto Sans TC','Open Sans','VL PGothic','Gothic A1','Segoe UI',sans-serif;
            }
        </style>
    @endif
    @yield('style')

    <!-- Scripts -->
    <script src="{{ asset('js/changelang.js') }}"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

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
                <li><a href="{{ url('/idol') }}">{{ __fb('Idols list') }}</a></li>
                <li><a href="{{ url('/search') }}">{{ __fb('Search') }}</a></li>
                <li><a href="{{ url('/clock') }}">Clock</a></li>
            </ul>
        </nav>
    </div>
    <div id="share_button">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-hashtags="ML_Portal" data-show-count="false" style="opacity: 0">Tweet</a>
        <a href="javascript:openShareWindow()" class="fedi">{{ __fb('Share') }}</a>
    </div>
</header>

@if(session('flash_message'))
    <div id="flash_message">
        @foreach(explode(':',session('flash_message')) as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif

<?php echo (!empty($fullwidth) && $fullwidth) ? "<div data-pagetype=\"fullwidth\">" : "<main>"; ?>
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
<?php echo (!empty($fullwidth) && $fullwidth) ? "</div>" : "</main>"; ?>


<footer>
    <div id="siteinfo">
        <div class="sitename">{{ config('ouranos.sitename') }}</div>
        <div class="appinfo">{{ config('app.name')." Ver".config('ouranos.version') }}</div>
        <p>
            <label>
                Language:
                <select id="language">
                    @foreach(config('ouranos.acceptableLangs') as $lang)
                        <option value="{{ $lang }}" @if(\App::isLocale($lang)) selected @endif>{{ __fb('locale.'.$lang) }}</option>
                    @endforeach
                </select>
            </label>
        </p>
        <div id="footlinks">
            <a href="{{ url('/about') }}">{{ __fb('About this site') }}</a>
            <a href="{{ config('ouranos.repositoryUrl','https://github.com/project-alisa/Ouranos') }}" target="_blank">GitHub</a>
            @forelse(config('ouranos.footerLinkUrls') as $site => $link)
                <a href="{{ $link }}" target="_blank">{{ $site }}</a>
            @empty
            @endforelse
        </div>
    </div>
    <div id="footbanners">
        <a href="https://miyacorata.net" target="_blank" title="MiyanojiRapid">
            <img src="{{ asset('image/miyanojirapid.png') }}" alt="MiyanojiRapid">
        </a>
    </div>
</footer>

<dialog id="sharewindow">
    <div class="msgbox" style="width: 700px">
        <div class="msgboxtop">Share</div>
        <div class="msgboxbody">
            <h2>{{ __fb('messages.share.title') }}</h2>
            <div style="padding: 5px 10px 10px;text-align: center">
                <p style="margin: 10px 15px;">{{ __fb('messages.share.input') }}</p>
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
                <p>{{ __fb('messages.share.select') }}</p>
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
                        var share_text = document.title + " " + encodeURIComponent(location.href);
                        window.open("https://"+instance+"/share?text="+share_text,"_blank","width=500,height=500");
                        closeShareWindow();
                    }
                </script>
            </div>
        </div>
        <div class="msgboxfoot">
            <a href="javascript:closeShareWindow()" class="button jw">{{ __fb('Close') }}</a>
        </div>
    </div>
</dialog>

@include('layouts.wall-kagawa')

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

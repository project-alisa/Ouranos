@extends('layouts.app',['css' => 'home', 'fullwidth' => true])

@section('content')
    <img src="{{ asset('image/homebackground.png') }}" alt="background" id="homebackground">
    <main>
        <h1 id="sitelogo"><img src="{{ asset('image/mlp_ouranos.png') }}" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"></h1>
        <div class="msgbox">
            <div class="msgboxtop">Welcome!!</div>
            <div class="msgboxbody" style="text-align: center">
                <p style="font-size: 24px">Welcome!!</p>
                <p>{{ config('ouranos.sitename',config('app.name','Ouranos')) }}は、アイドルマスターミリオンライブの非公式データベース＆ポータルサイトです。</p>
                <hr>
                <div class="buttonbox">
                    <a href="{{ url('/idol') }}" class="button jwil">
                        {{ __('Idols list') }}
                        <span class="subline">{{ __('messages.idol.show.desc') }}</span>
                    </a>
                    <a href="{{ url('/search') }}" class="button jwil">
                        {{ __('Search') }}
                        <span class="subline">{{ __('messages.search.index.desc') }}</span>
                    </a>
                </div>
            </div>
            <div class="msgboxfoot"></div>
        </div>
    </main>

@endsection

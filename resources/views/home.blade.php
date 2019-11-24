@extends('layouts.app',['css' => 'home'])

@section('content')
    <img src="{{ asset('image/homebackground.png') }}" alt="background" id="homebackground">
    <div id="homecontent">
        <h1 id="sitelogo"><img src="{{ asset('image/mlp_ouranos.png') }}" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"></h1>
        <div class="msgbox">
            <div class="msgboxtop">Welcome!!</div>
            <div class="msgboxbody" style="text-align: center">
                <p style="font-size: 24px">Welcome!!</p>
                <p>{{ config('ouranos.sitename',config('app.name','Ouranos')) }}は、アイドルマスターミリオンライブの非公式データベース＆ポータルサイトです。</p>
            </div>
            <div class="msgboxfoot"></div>
        </div>
    </div>

@endsection

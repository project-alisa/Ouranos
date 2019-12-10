@extends('layouts.app',['title' => __('About this site')])

@section('content')
<div class="msgbox">
    <div class="msgboxtop">{{ __('About this site') }}</div>
    <div class="msgboxbody">
        <p style="text-align: center;font-size: 25px;">MillionLivePortalへようこそ！</p>
        <p style="text-align: center;font-size: 16px;color: gray">
            Welcome to MillionLivePortal!<br>
            MillionLivePortal에 오신 것을 환영합니다.
        </p>
        <hr>
    </div>
    <div class="msgboxfoot"></div>
</div>
@endsection

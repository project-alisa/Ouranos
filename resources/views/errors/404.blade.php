@extends('layouts.app',['title' => '404 Not Found', 'css' => 'error'])

@section('content')
    <div id="error">
        <img src="{{ asset('image/arara.png') }}" alt="reika" id="reika">
        <img src="{{ asset('image/arara_fukidashi.png') }}" alt="arara" id="arara">
        <div class="error">
            <div class="code">404</div>
            <div class="desc">Not Found</div>
        </div>
        <p>
            {{ __('The requested page was not found on this server.') }}
        </p>
    </div>
@endsection

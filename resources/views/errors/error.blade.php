@extends('layouts.app',['title' => '403 Forbidden', 'css' => 'error'])

@php
$status_desc = array(
    400 => 'Bad Request',
    403 => 'Forbidden',
    404 => 'Not Found',
    500 => 'Internal Server Error',
    503 => 'Service Unavailable'
);
$status_message = array(
    400 => __('Format of the request is not correct.'),
    403 => __('You don\'t have a permission to access to this page.'),
    404 => __('The requested page was not found on this server.'),
    500 => __('A fault or an error has occurred.'),
    503 => __('Service temporarily unavailable due to capacity problems or maintenance.')
);
if(!empty($exception)){
    $code = $exception->getStatusCode() ?: '500';
    $desc = $status_desc[$code];
    $message = $status_message[$code];
}
@endphp

@section('content')
    <div id="error">
        <img src="{{ asset('image/arara.png') }}" alt="reika" id="reika">
        <img src="{{ asset('image/arara_fukidashi.png') }}" alt="arara" id="arara">
        <div class="error">
            <div class="code">{{ $code }}</div>
            <div class="desc">{{ $desc }}</div>
        </div>
        <p>
            {{ $message }}
        </p>
    </div>
@endsection
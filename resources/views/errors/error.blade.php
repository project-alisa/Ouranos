@php
$status_desc = array(
    400 => 'Bad Request',
    403 => 'Forbidden',
    404 => 'Not Found',
    500 => 'Internal Server Error',
    503 => 'Service Unavailable',
    'default' => 'Something Wrong'
);
$status_message = array(
    400 => __fb('messages.400'),
    403 => __fb('messages.403'),
    404 => __fb('messages.404'),
    500 => __fb('messages.500'),
    503 => __fb('messages.503')
);
if(!empty($exception)){
    $code = $exception->getStatusCode();
    $desc = $status_desc[$code] ?? 'Error '.$code;
    $message = $exception->getMessage() ?: $status_message[$code] ?? 'A serious error has occurred. Please contact to administrator with error code.';
}
@endphp

@extends('layouts.app',['title' => $desc, 'css' => 'error'])

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

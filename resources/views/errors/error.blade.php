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
    400 => __('messages.400'),
    403 => __('messages.403'),
    404 => __('messages.404'),
    500 => __('messages.500'),
    503 => __('messages.503')
);
if(!empty($exception)){
    $code = $exception->getStatusCode();
    $desc = $status_desc[$code] ?? 'Error '.$code;
    $message = $exception->getMessage() ?: $status_message[$code] ?? 'A serious error has occurred. Please contact to administrator with error code.';
    if($code === 500) $message = $status_message[500];
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

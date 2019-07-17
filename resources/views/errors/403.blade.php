@extends('layouts.app',['title' => '403 Forbidden', 'css' => 'error'])

@section('content')
    <div id="error">
        <img src="{{ asset('image/arara.png') }}" alt="reika" id="reika">
        <img src="{{ asset('image/arara_fukidashi.png') }}" alt="arara" id="arara">
        <div class="error">
            <div class="code">403</div>
            <div class="desc">Forbidden</div>
        </div>
        <p>
            @if(!empty($exception->getMessage()))
                {{ $exception->getMessage() }}
            @else
                {{ __('You dont have a permission to access to this page.') }}
            @endif
        </p>
    </div>
@endsection
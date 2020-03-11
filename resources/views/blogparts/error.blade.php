@extends('blogparts.base',['title' => 'Error!'])

@section('content')
    <div id="error">
        <h2 style="color: darkred">ERROR!</h2>
        <p>{{ $message ?? '何らかのエラーが発生しました' }}</p>
    </div>
@endsection

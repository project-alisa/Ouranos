@extends('layouts.app',['title' => '事務室'])

@section('content')
<div class="msgbox">
    <div class="msgboxtop">Dashboard</div>

    <div class="msgboxbody">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>
            どうしてオレたちを殺そうとするんだ！
        </p>
    </div>
    <div class="msgboxfoot"></div>
</div>
@endsection

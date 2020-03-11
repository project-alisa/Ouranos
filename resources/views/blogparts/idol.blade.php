@extends('blogparts.base',['title' => 'アイドル情報'])

@section('content')
<div id="mainline">
    <a href="{{ url('/idol/'.$idol->name_r) }}" style="text-decoration: none">
        <img src="{{ asset('image/icon/'.$idol->name_r.'/0.png') }}" alt="{{ $idol->name }}" id="icon"
             style="border: solid 3px {{ getTypeColor($idol->type) }}">
    </a>
    <div id="name">
        <a href="{{ url('/idol/'.$idol->name_r) }}">
            {{ !empty($idol->subname) ? $idol->subname : separateString($idol->name,$idol->name_separate) }}
        </a>
        <div>
            {{ separateString($idol->name_y,$idol->name_y_separate) }}<br>
            {{ ucwords(separateString($idol->name_r,$idol->name_r_separate)) }}
        </div>
    </div>
</div>
<table class="table">
    <tr>
        <th>誕生日</th><td>{{ convertDateString($idol->birthdate,'ja') }}</td>
        <th>年齢</th><td>{{ $idol->age.'歳' }}</td>
    </tr>
    <tr>
        <th>CV</th><td colspan="3">{{ $idol->cv }}</td>
    </tr>
</table>
@endsection

@section('head')
<style>
    #mainline{
        display: flex;
    }
    #icon{
        width: auto;
        height: 70px;
        border: solid 3px black;
        border-radius: 7px;
        margin-right: 8px;
    }
    #name{
        font-size: 15px;
    }
    #name > a{
        display: block;
        font-size: 24px;
        padding-bottom: 3px;
    }
    .table th{
        width: 45px;
    }
</style>
@endsection

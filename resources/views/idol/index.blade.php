@extends('layouts.app',['title' => $type.' '.__('Idols list'), 'sub' => __('messages.idol.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('Idols list') }}</div>
                <div class="msgboxbody">
                    <?php
                    $current_lang = App::getLocale();
                    $ja_flag = App::isLocale('ja');
                    ?>
                    @foreach ($idols as $idol)
                        @include('layouts.idol',['idol' => $idol])
                    @endforeach
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('messages.idol.index.typeselect') }}</div>
                <div class="msgboxbody">
                    <div class="buttonbox">
                        <a class="button jwil{{ $type === 'Princess' ? ' selected' : '' }}" href="{{ url('/idol?type=Princess') }}">
                            <img src="{{ asset('image/princess_symbol.png') }}" class="emoji" alt="Pr"> Princess</a>
                        <a class="button jwil{{ $type === 'Fairy' ? ' selected' : '' }}" href="{{ url('/idol?type=Fairy') }}">
                            <img src="{{ asset('image/fairy_symbol.png') }}" class="emoji" alt="Fa"> Fairy</a>
                        <a class="button jwil{{ $type === 'Angel' ? ' selected' : '' }}" href="{{ url('/idol?type=Angel') }}">
                            <img src="{{ asset('image/angel_symbol.png') }}" class="emoji" alt="An"> Angel</a>
                        <a class="button jwil{{ $type === 'Ex' ? ' selected' : '' }}" href="{{ url('/idol?type=Ex') }}">
                            Ex</a>
                    </div>
                </div>
                <div class="msgboxfoot">
                    <a class="button jw" href="{{ url('/idol') }}">Reset</a>
                </div>
            </div>
            <div class="msgbox">
                <div class="msgboxtop">Inform@tion</div>
                <div class="msgboxbody">
                    <h2>{{ __('messages.idol.index.typedetail',['type' => $type ?: 'All']) }}</h2>
                    <p>
                        {{ __('messages.common.numbersof',['type' => $type.' '.__('Idol')]) }}：{{ $idol_count }}
                    </p>
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
    </div>


@endsection

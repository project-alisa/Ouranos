@extends('layouts.app',['title' => __('Search'), 'sub' => __('messages.search.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('Search') }}</div>
                <div class="msgboxbody">
                    <p class="notification">
                        {{ __('messages.search.result.found',['count' => $search_count]) }}
                    </p>
                    <?php
                    $current_lang = App::getLocale();
                    $ja_flag = App::isLocale('ja');
                    ?>
                    @forelse ($search as $idol)
                        @include('layouts.idol',['idol' => $idol])
                    @empty
                        <p>ない</p>
                    @endforelse
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('messages.search.result.query') }}</div>
                <div class="msgboxbody">
                    <p>{{ trans_choice('messages.search.result.query.info',count($query_info)) }}</p>
                    @foreach($query_info as $query)
                        <h3>{{ __($query['type']) }}</h3>
                        <p style="text-align: center;font-size: 18px;">{{ $query['value'] }}</p>
                    @endforeach
                </div>
                <div class="msgboxfoot">
                    <a href="{{ url('/search') }}" class="button jw">{{ __('Reset') }}</a>
                </div>
            </div>
        </div>
    </div>


@endsection

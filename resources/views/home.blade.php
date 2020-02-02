@extends('layouts.app',['css' => 'home', 'fullwidth' => true])

<?php
    $bg_position = preg_match('/Android.+Chrome/',$_SERVER['HTTP_USER_AGENT'])
        ? 'background-position: center top;' : '';
    $current_lang = App::getLocale();
    $ja_flag = App::isLocale('ja');
?>

@section('content')
    <div id="homebackground"
         style="background-image: url('{{ asset('image/card/'.config('ouranos.homeCardName').'.jpg') }}');{!! $bg_position !!}"></div>
    <main>
        <h1 id="sitelogo"><img src="{{ asset('image/mlp_ouranos.png') }}" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"></h1>
        <div class="msgbox" style="width: 930px;margin: 0 auto 20px;">
            <div class="msgboxtop">Welcome!!</div>
            <div class="msgboxbody">
                <div style="text-align: center">
                    <p style="font-size: 24px">Welcome!!</p>
                    <p>{{ __fb('messages.home.description') }}</p>
                    <hr>
                    <div class="buttonbox">
                        <a href="{{ url('/idol') }}" class="button jwil">
                            {{ __fb('Idols list') }}
                            <span class="subline">{{ __fb('messages.idol.show.desc') }}</span>
                        </a>
                        <a href="{{ url('/search') }}" class="button jwil">
                            {{ __fb('Search') }}
                            <span class="subline">{{ __fb('messages.search.index.desc') }}</span>
                        </a>
                    </div>
                </div>
                @if($birthday->count() !== 0)
                    <h2>本日のお誕生日</h2>
                    <p style="font-size: 18px; text-align: center;padding: 2px">{{ $birth_text }}</p>
                    @foreach($birthday as $idol)
                        @include('layouts.idol',['idol' => $idol])
                    @endforeach
                @endif
            </div>
            <div class="msgboxfoot"></div>
        </div>

        <div id="twinbox">
            <div id="contentwide">
                <div class="msgbox">
                    <div class="msgboxtop">{{ __fb('messages.home.latestnews') }}</div>
                    <div class="msgboxbody">
                        <p>
                            <a href="https://mstdn.miyacorata.net/@ml_portal" class="mstdn" target="_blank">ml_portal<span>mstdn.miyacorata.net</span></a>
                            {{ __fb('messages.home.mastodon') }}
                        </p>
                        <hr>
                        <div style="height: 500px;overflow-y: scroll">
                            <?php
                            if(!empty($feed)){
                                foreach ($feed->channel->item as $entry){
                                    if(mb_strpos($entry->description,"(承前)"))continue;
                                    echo "<h3>".date("Y年n月j日 H:i",strtotime($entry->pubDate) + (60 * 60 * 9 * 0))."配信</h3><a href=\"".$entry->link."\" class=\"mstdn\" target=\"_blank\">Mastodonで見る</a>".PHP_EOL;
                                    echo $entry->description.PHP_EOL;
                                }
                            }else{
                            ?>
                            <p style="padding-top: 130px;text-align: center">
                                <img src="{{ asset('image/arara.png') }}" alt="Kotori" style="height: 50%;width: auto;padding-bottom:10px;"><br>
                                Mastodonからお知らせを取得できませんでした
                            </p>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="msgboxfoot"></div>
                </div>
            </div>
            <div id="contentnarrow">
                <div class="msgbox">
                    <div class="msgboxtop">System Info</div>
                    <div class="msgboxbody">
                        <h2>Version</h2>
                        <p>{{ config('app.name','Ouranos').' Ver'.config('ouranos.version') }}</p>
                    </div>
                    <div class="msgboxfoot"></div>
                </div>
            </div>
        </div>
    </main>

@endsection

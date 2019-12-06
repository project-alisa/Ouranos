@extends('layouts.app',['css' => 'home', 'fullwidth' => true])

@section('content')
    <img src="{{ asset('image/homebackground.png') }}" alt="background" id="homebackground">
    <main>
        <h1 id="sitelogo"><img src="{{ asset('image/mlp_ouranos.png') }}" alt="{{ config('ouranos.sitename',config('app.name','Ouranos')) }}"></h1>
        <div class="msgbox" style="width: 1000px;margin: 0 auto 20px;">
            <div class="msgboxtop">Welcome!!</div>
            <div class="msgboxbody" style="text-align: center">
                <p style="font-size: 24px">Welcome!!</p>
                <p>{{ __('messages.home.description') }}</p>
                <hr>
                <div class="buttonbox">
                    <a href="{{ url('/idol') }}" class="button jwil">
                        {{ __('Idols list') }}
                        <span class="subline">{{ __('messages.idol.show.desc') }}</span>
                    </a>
                    <a href="{{ url('/search') }}" class="button jwil">
                        {{ __('Search') }}
                        <span class="subline">{{ __('messages.search.index.desc') }}</span>
                    </a>
                </div>
            </div>
            <div class="msgboxfoot"></div>
        </div>

        <div id="twinbox">
            <div id="contentwide">
                <div class="msgbox">
                    <div class="msgboxtop">{{ __('messages.home.latestnews') }}</div>
                    <div class="msgboxbody">
                        <p>
                            <a href="https://mstdn.miyacorata.net/@ml_portal" class="mstdn" target="_blank">ml_portal<span>mstdn.miyacorata.net</span></a>
                            {{ __('messages.home.mastodon') }}
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

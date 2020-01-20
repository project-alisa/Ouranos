@extends('layouts.app',['title' => $title, 'sub' => __fb('messages.idol.show.desc'), 'css' => 'idol'])

@section('content')
    @if(date('2017-m-d') === $idol->birthdate) {{-- 2017-m-d --}}
        <div id="happybirthday" style="background: rgba({{ convertColorcode($idol->color,true) }},0.3);display: flex">
            <img src="{{ asset('image/icon/'.$idol->name_r.'/0.png') }}" alt="{{ $idol->name }}" style="width: 55px;display: block;padding-right: 12px">
            <div>
                <span style="font-size:25px">Happy Birthday {{ ucfirst(substr($idol->name_r,0,($idol->name_r_separate ?: strlen($idol->name_r)))) }}!</span><br>
                {{ date('l F jS, Y') }}
            </div>
        </div>
    @endif
    <div id="idoldetail">
        <img id="tachie" src="{{ asset('image/tachie/'.$idol->name_r.'.png') }}" alt="{{ $idol->name }}">
        <div id="info">
            <div id="dataheader">
                <div id="idolname" class="{{ $idol->type }}">
                    <span style="font-size: 32px">{{ !empty($idol->subname) ? $idol->subname : separateString($idol->name,$idol->name_separate) }}</span><br>
                    <span style="color: gray">{{ mb_strtoupper(separateString($idol->name_r,$idol->name_r_separate)) }}</span>
                </div>
                <table id="idolinfo">
                    <tr>
                        <th title="{{ __fb('messages.idol.show.dbid') }}">{{ __fb('Database ID') }}</th><td>{{ $idol->id }}</td>
                    </tr>
                    <tr>
                        <th title="{{ __fb('messages.idol.show.type') }}">{{ __fb('Idol').(\App::isLocale('ja') ? '' : ' ').__fb('Type') }}</th>
                        <td>
                            <span style="{{ empty($idol->greemas_type) ? 'font-style:italic' : 'color:'.getTypeColor($idol->greemas_type) }}" title="GREE Ver">
                                {{ $idol->greemas_type ?? 'N/A' }}</span> /
                            <span style="color: {{ getTypeColor($idol->type) }}" title="MLTD">{{ $idol->type }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __fb('Personal Color') }}</th><td style="color:{{ '#'.($idol->color ?: '000') }}">
                            {{ !empty($idol->color) ? '■ #'.str_replace('#','',$idol->color) : 'N/A' }}
                        </td>
                    </tr>
                </table>
            </div>
            <hr class="gradient">
            <table id="datatable">
                <tr>
                    <?php /** @var App\Idol $idol */
                    $namestr = separateString($idol->name,$idol->name_separate);
                    if(!empty($idol->subname)) $namestr .= ' ('.$idol->subname.')';
                    $dateflag = App::isLocale('ja') ? 'ja' : 'slash';
                    $urlname = urlencode($idol->name) ?>
                    <th>{{ __fb('Name') }}</th><td colspan="2" class="ja">{{ $namestr }}</td>
                    <th>{{ __fb('CV') }}</th><td colspan="2" class="ja">{{ $idol->cv }}</td>
                </tr>
                <tr>
                    <th>{{ __fb('Hiragana') }}</th><td colspan="2" class="ja">{{ separateString($idol->name_y,$idol->name_y_separate) }}</td>
                    <th>{{ __fb('Chinese')  }}</th><td colspan="2" class="zh_TW">{{ $idol->name_zh ? separateString($idol->name_zh,$idol->name_zh_separate) : __fb('N/A') }}</td>
                </tr>
                <tr>
                    <th>Alphabet</th><td colspan="2">{{ ucwords(separateString($idol->name_r,$idol->name_r_separate)) }}</td>
                    <th>{{ __fb('Hangul') }}</th><td colspan="2">{{ $idol->name_ko ? separateString($idol->name_ko,$idol->name_ko_separate) : __fb('N/A') }}</td>
                </tr>
                <tr>
                    <th>{{ __fb('Birthdate') }}</th><td>{{ $idol->birthdate ? convertDateString($idol->birthdate,$dateflag) : __fb('N/A') }}</td>
                    <th>{{ __fb('Height') }}</th><td>{{ $idol->height ?: '? ' }}cm</td>
                    <th>{{ __fb('Blood type') }}</th><td>{{ $idol->bloodtype ?: __fb('N/A') }}</td>
                </tr>
                <tr>
                    <th>{{ __fb('Age') }}</th><td>{{ $idol->age ? $idol->age.(!App::isLocale('en') ? __fb('years old') : '') : __fb('N/A')}}</td>
                    <th>{{ __fb('Weight') }}</th><td>{{ $idol->weight ?: '? ' }}kg</td>
                    <th>{{ __fb('Handedness') }}</th><td>{{ __fb(translateHandedness($idol->handedness)) ?: __fb('N/A') }}</td>
                </tr>
                <tr>
                    <th>{{ __fb('Birthplace') }}</th><td class="ja"><a href="{{ url('/search').'?birthplace='.$idol->birthplace }}">{{ $idol->birthplace ?: '不明' }}</a></td>
                    <th>BMI</th><td>{{ calcBmi($idol->height,$idol->weight) ?: __fb('N/A') }}</td>
                    <th>{{ __fb('3 size') }}</th><td>{{ $idol->bust ? $idol->bust.' / '.$idol->waist.' / '.$idol->hip : __fb('N/A') }}</td>
                </tr>
                <tr>
                    <th>{{ __fb('Hobby') }}</th>
                    <td colspan="5" class="ja">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->hobby,App::getLocale()) ?>
                        {{ $idol->hobby ?: __fb('N/A') }}
                    </td>
                </tr>
                <tr>
                    <th>{{ __fb('Skill') }}</th>
                    <td colspan="5" class="ja">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->skill,App::getLocale()) ?>
                        {{ $idol->skill ?: __fb('N/A') }}
                    </td>
                </tr>
                <tr>
                    <th>{{ __fb('Favorite') }}</th>
                    <td colspan="5" class="ja">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->favorite,App::getLocale()) ?>
                        {{ $idol->favorite ?: __fb('N/A') }}
                    </td>
                </tr>
            </table>
            <div id="idollinks">
                <div>
                    <h2>{{ __fb('Encyclopedia') }}</h2>
                    <div class="buttonbox">
                        <a href="https://dic.nicovideo.jp/a/{{ urlencode($idol->name) }}" class="button jwil" target="_blank">
                            {{ __fb('niconico Pedia') }}
                        </a>
                        <a href="https://dic.pixiv.net/a/{{ urlencode($idol->name) }}" class="button jwil" target="_blank">
                            {{ __fb('pixiv encyclopedia (ja)') }}
                        </a>
                    </div>
                </div>
                <div>
                    <h2>{{ __fb('Musics info') }}</h2>
                    <div class="buttonbox">
                        <a href="https://fujiwarahaji.me/idol/765/{{ $idol->name_r }}" class="button jwil" target="_blank">
                            {{ __fb('fujiwarahaji.me') }}
                            <span class="subline">{{ __fb('THE IDOLM@STER Musics DB') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __fb('mediasearch.title') }}</div>
                <div class="msgboxbody">
                    <h2>{{ __fb('mediasearch.twitter') }}</h2>
                    <div class="buttonbox">
                        <a href="https://twitter.com/search?q={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f50e; {{ __fb('mediasearch.twitter.normal') }}<br><span class="subline">{{ __fb('mediasearch.twitter.normal.desc') }}</span>
                        </a>
                        <a href="https://twitter.com/search?f=live&q={{ $urlname }}" class="button jwil" target="_blank">
                            &#x231a; {{ __fb('mediasearch.twitter.realtime') }}<br><span class="subline">{{ __fb('mediasearch.twitter.realtime.desc') }}</span>
                        </a>
                        <a href="https://twitter.com/search?f=user&q={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f1f5; {{ __fb('mediasearch.twitter.user') }}<br><span class="subline">{{ __fb('mediasearch.twitter.user.desc') }}</span>
                        </a>
                        <a href="https://twitter.com/search?f=image&q={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f4f7; {{ __fb('mediasearch.twitter.image') }}<br><span class="subline">{{ __fb('mediasearch.twitter.image.desc') }}</span>
                        </a>
                        <a href="https://twitter.com/search?f=video&q={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f4f9; {{ __fb('mediasearch.twitter.video') }}<br><span class="subline">{{ __fb('mediasearch.twitter.video.desc') }}</span>
                        </a>
                        <a href="https://azure-gallery.net/?query=imas%3A{{ $urlname }}" class="button jwil" target="_blank">
                            &#x2693; {{ __fb('mediasearch.twitter.azure') }}<br><span class="subline">{{ __fb('mediasearch.twitter.azure.desc') }}</span>
                        </a>
                    </div>
                    <p class="notification">
                        {{ __fb('mediasearch.twitter.notice.0') }}<br>
                        {{ __fb('mediasearch.twitter.notice.1') }}
                    </p>
                    <h2>{{ __fb('mediasearch.niconico') }}</h2>
                    <div class="buttonbox">
                        <a href="http://www.nicovideo.jp/search/{{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f4fa; {{ __fb('mediasearch.niconico.keyword') }}
                        </a>
                        <a href="http://www.nicovideo.jp/tag/{{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f4fa; {{ __fb('mediasearch.niconico.tag') }}
                        </a>
                        <a href="http://seiga.nicovideo.jp/tag/{{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f3a8; {{ __fb('mediasearch.niconico.seiga') }}
                        </a>
                    </div>
                    <h2>{{ __fb('mediasearch.pixiv') }}</h2>
                    <div class="buttonbox">
                        <a href="https://www.pixiv.net/search.php?s_mode=s_tag_full&word={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f3a8; {{ __fb('mediasearch.pixiv.tag') }}<br><span class="subline">{{ __fb('mediasearch.pixiv.tag.desc') }}</span>
                        </a>
                        <a href="https://www.pixiv.net/search.php?s_mode=s_tc&word={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f3a8; {{ __fb('mediasearch.pixiv.keyword') }}<br><span class="subline">{{ __fb('mediasearch.pixiv.keyword.desc') }}</span>
                        </a>
                        <a href="https://www.pixiv.net/novel/tags.php?tag={{ $urlname }}" class="button jwil" target="_blank">
                            &#x1f4dd; {{ __fb('mediasearch.pixiv.novel') }}<br><span class="subline">{{ __fb('mediasearch.pixiv.novel.desc') }}</span>
                        </a>
                    </div>
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">TheaterDays info</div>
                <div class="msgboxbody">
                    <h2>{{ __fb('messages.idol.show.mltd.ja') }}</h2>
                    <div class="buttonbox">
                        <a href="https://mltd.matsurihi.me/cards/#idol-list-{{ $idol->id }}" class="button jwil" target="_blank">
                            {{ __fb('messages.idol.show.mltd.ja.cards') }}
                            <span class="subline">matsurihi.me Fantasia</span>
                        </a>
                    </div>
                    <h2>{{ __fb('messages.idol.show.mltd.oversea') }}</h2>
                    @if(!empty($idol->cknameid))
                        <div class="buttonbox">
                            <a href="https://mltd.matsurihi.me/zh/cards/#idol-list-{{ $idol->id }}" class="button jw" target="_blank">
                                Chinese
                            </a>
                            <a href="https://mltd.matsurihi.me/ko/cards/#idol-list-{{ $idol->id }}" class="button jw" target="_blank">
                                Korean
                            </a>
                        </div>
                    @else
                        <p class="notice">{{ __fb('messages.idol.show.mltd.oversea.none') }}</p>
                    @endif
                </div>
                <div class="msgboxfoot"></div>
            </div>
            <div class="msgbox">
                <div class="msgboxtop">GREEm@s info</div>
                <div class="msgboxbody">
                    @if(empty($idol->greemas_type))
                        <p class="notice">
                            {{ __fb('messages.idol.show.gree.none') }}
                        </p>
                    @else
                        <div class="buttonbox">
                            <a href="http://mill.tokyo/category/{{ strtolower($idol->greemas_type).'/'.genMillTokyoLinkText($idol->name_r,$idol->name_r_separate) }}/"
                               class="button jwil" target="_blank">MillionLive Cards<span class="subline">mill.tokyo</span></a>
                        </div>
                    @endif
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
    </div>

@endsection

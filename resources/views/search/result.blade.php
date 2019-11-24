@extends('layouts.app',['title' => __('Search'), 'sub' => __('messages.search.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('Search') }}</div>
                <div class="msgboxbody">
                    <p class="notification">
                        {{ $search_count }}人のアイドルが該当しました
                    </p>
                    @forelse ($search as $idol)
                        <?php
                        /** @var App\Idol $idol */
                        $icon = asset('image/icon/'.$idol->name_r.'/0.png');
                        $ja_flag = App::isLocale('ja');
                        if(!$ja_flag){
                            $name = 'name_'.(App::isLocale('en') ? 'r' : App::getLocale());
                            if(empty($idol->$name)) $name = 'name_r'; //fallback
                            $separate = $name.'_separate';
                            $text = e(ucwords(separateString($idol->$name,$idol->$separate)));
                            $text .= "<span style='font-size: 15px;color: dimgray;margin-left: 15px'>".e(ucwords(separateString($idol->name,$idol->name_separate)))."</span>";
                        }
                        $dateflag = $ja_flag ? 'ja' : 'slash';
                        ?>
                        <a href="{{ url('/idol/'.$idol->name_r) }}" class="idol">
                            <img src="{{ $icon }}" class="idolicon" alt="icon" style="border-color: {{ getTypeColor($idol->type) }}">
                            <div class="idolinfo">
                                <p class="name">{!! $ja_flag ? e(separateString($idol->name,$idol->name_separate)) : $text !!}</p>
                                <table>
                                    <tr>
                                        <th>{{ __('Type') }}</th><td style="width: 80px;font-weight: bold;color: {{ getTypeColor($idol->type) }}">{{ $idol->type }}</td>
                                        <th>{{ __('Age') }}</th><td style="width: 70px;">{{ $idol->age }}</td>
                                        <th>{{ __('Birthdate') }}</th><td>{{ convertDateString($idol->birthdate,$dateflag) }}</td>
                                        <th>{{ __('Color') }}</th><td style="color: {{ '#'.$idol->color }};width: 100px">{{ !empty($idol->color) ? '■ #'.str_replace('#','',$idol->color) : 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                    @empty
                        <p>ない</p>
                    @endforelse
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">検索クエリ</div>
                <div class="msgboxbody">
                    <p>以下の条件による検索結果です</p>
                    @foreach($query_info as $query)
                        <h3>{{ __($query['type']) }}</h3>
                        <p style="text-align: center;font-size: 18px;">{{ $query['value'] }}</p>
                    @endforeach
                </div>
                <div class="msgboxfoot">
                    <a href="{{ url('/search') }}" class="button jw">リセット</a>
                </div>
            </div>
        </div>
    </div>


@endsection

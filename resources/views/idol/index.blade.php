@extends('layouts.app',['title' => $type.' '.__fb('Idols list'), 'sub' => __fb('messages.idol.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __fb('Idols list') }}</div>
                <div class="msgboxbody">
                    @foreach ($idols as $idol)
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
                                        <th>{{ __fb('Type') }}</th><td style="width: 80px;font-weight: bold;color: {{ getTypeColor($idol->type) }}">{{ $idol->type }}</td>
                                        <th>{{ __fb('Age') }}</th><td style="width: 70px;">{{ $idol->age ?: 'N/A' }}</td>
                                        <th>{{ __fb('Birthdate') }}</th><td>{{ $idol->birthdate ? convertDateString($idol->birthdate,$dateflag) : 'N/A' }}</td>
                                        <th>{{ __fb('Color') }}</th><td style="color: {{ '#'.$idol->color }};width: 100px">{{ !empty($idol->color) ? '■ #'.str_replace('#','',$idol->color) : 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">{{ __fb('messages.idol.index.typeselect') }}</div>
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
                    <h2>{{ __fb('messages.idol.index.typedetail',['type' => $type ?: 'All']) }}</h2>
                    <p>
                        {{ __fb('messages.common.numbersof',['type' => $type.' '.__fb('Idol')]) }}：{{ $idol_count }}
                    </p>
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
    </div>


@endsection

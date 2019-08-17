@extends('layouts.app',['title' => __('Idols list'), 'sub' => __('messages.idol.index.desc')])

@section('content')
    <div id="contentright">
        <div class="msgbox">
            <div class="msgboxtop">Navigation</div>
            <div class="msgboxbody">
                <p>
                    Hoge
                </p>
            </div>
            <div class="msgboxfoot"></div>
        </div>
    </div>
    <div id="contentleft">
        <div class="msgbox">
            <div class="msgboxtop">{{ __('Idols list') }}</div>
            <div class="msgboxbody">
                @foreach ($idols as $idol)
                    @php
                        /** @var App\Idol $idol */
                        $icon = asset('image/icon/'.$idol->name_r.'/0.png');
                        $dateflag = App::isLocale('ja') ? 'ja' : 'slash';
                    @endphp
                    <a href="{{ url('/idol/'.$idol->name_r) }}" class="idol">
                        <img src="{{ $icon }}" class="idolicon" alt="icon" style="border-color: {{ getTypeColor($idol->type) }}">
                        <div class="idolinfo">
                            <p class="name">{{ separateString($idol->name,$idol->name_separate) }}</p>
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
                @endforeach
            </div>
            <div class="msgboxfoot"></div>
        </div>
    </div>
@endsection

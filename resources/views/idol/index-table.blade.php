@extends('layouts.app',['title' => __('messages.table.title'), 'sub' => __('messages.table.desc'), 'fullwidth' => true, 'viewport' => 1920])
<?php
$ja_flag = App::isLocale('ja');
$dateflag = $ja_flag ? 'ja' : 'slash';
?>

@section('content')
    <main style="width: 1860px;">
        <div class="msgbox">
            <div class="msgboxtop">{{ __('Idols list') }}</div>
            <div class="msgboxbody">
                <table id="idols">
                    <thead>
                    <tr>
                        <th class="sort" data-sort="id" colspan="2">ID</th>
                        <th class="sort" data-sort="name">{{ __('Name') }}</th>
                        <th class="sort" data-sort="hiragana">{{ __('Hiragana') }}</th>
                        <th class="sort" data-sort="alphabet">Alphabet</th>
                        <th class="sort" data-sort="type">{{ __('Type') }}</th>
                        <th class="sort" data-sort="birthdate">{{ __('Birthdate') }}</th>
                        <th class="sort" data-sort="age">{{ __('Age') }}</th>
                        <th class="sort" data-sort="height">{{ __('Height') }}</th>
                        <th class="sort" data-sort="weight">{{ __('Weight') }}</th>
                        <th class="sort" data-sort="bust">B</th>
                        <th class="sort" data-sort="waist">W</th>
                        <th class="sort" data-sort="hip">H</th>
                        <th class="sort" data-sort="handedness">{{ __('Handedness') }}</th>
                        <th>{{ __('CV') }}</th>
                        <th>{{ __('Color') }}</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($idols as $idol)
                        <tr style="background: rgba({{ convertColorcode($idol->color,true) }},0.1)">
                            <td class="icon" style="border-left-color: {{ '#'.str_replace('#','',$idol->color) }}">
                                <img src="{{ asset('image/icon/'.$idol->name_r.'/0.png') }}" class="{{ strtolower($idol->type) }}" alt="{{ $idol->name }}">
                            </td>
                            <td class="id" data-id="{{ $idol->id }}">{{ $idol->id }}</td>
                            <td class="name ja" data-name="{{ $idol->name }}">
                                <a href="{{ url('/idol/'.$idol->name_r) }}">{{ separateString($idol->name, $idol->name_separate) }}</a></td>
                            <td class="hiragana ja" data-hiragana="{{ $idol->name_y }}">{{ separateString($idol->name_y, $idol->name_y_separate) }}</td>
                            <td class="alphabet" data-alphabet="{{ $idol->name_r }}">{{ ucwords(separateString($idol->name_r, $idol->name_r_separate)) }}</td>
                            <td class="type {{ strtolower($idol->type) }}">{{ $idol->type }}</td>
                            <td class="birthdate" data-birthdate="{{ $idol->birthdate }}">
                                {{ $idol->birthdate ? convertDateString($idol->birthdate,$dateflag) : 'N/A' }}</td>
                            <td class="age">{{ $idol->age ? $idol->age.(App::isLocale('ja') ? '歳' : '') : 'N/A' }}</td>
                            <td class="height">{{ $idol->height ? $idol->height.'cm' : 'N/A' }}</td>
                            <td class="weight" data-weight="{{ $idol->weight ? ($idol->weight * 10) : 0 }}">
                                {{ $idol->weight ? $idol->weight.'kg' : 'N/A' }}</td>
                            <td class="bust">{{ $idol->bust ?: '-' }}</td>
                            <td class="waist">{{ $idol->waist ?: '-' }}</td>
                            <td class="hip">{{ $idol->hip ?: '-' }}</td>
                            <td class="handedness">{{ __(translateHandedness($idol->handedness)) ?: 'N/A' }}</td>
                            <td class="cv ja">{{ $idol->cv }}</td>
                            <td class="color" style="color: {{ '#'.str_replace('#','',$idol->color) }}; border-right-color: {{ '#'.str_replace('#','',$idol->color) }}">
                                {{ $idol->color ? '#'.str_replace('#','',$idol->color) : 'N/A' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
                <script>
                    var options = {
                        valueNames: [
                            { name: 'id'     , attr: 'data-id' },
                            { name: 'name'     , attr: 'data-name' },
                            { name: 'hiragana' , attr: 'data-hiragana' },
                            { name: 'alphabet' , attr: 'data-alphabet' },
                            'type',
                            { name: 'birthdate', attr: 'data-birthdate' },
                            'age',
                            'height',
                            { name: 'weight'   , attr: 'data-weight' },
                            'bust',
                            'waist',
                            'hip',
                        ]
                    };
                    var userList = new List('idols', options);
                    //userList.alphabet = 'あぁいぃうぅゔえぇおぉかがきぎくぐけげこごさざしじすずせぜそぞただちぢつづってでとどなにぬねのはばぱひびぴふぶぷへべぺほぼぽまみむめもやゃゆゅよょらりるれろわゎゐゑをん';
                </script>
            </div>
            <div class="msgboxfoot"></div>
        </div>
    </main>

@endsection

@section('style')
    <style>
        .sort.desc:after {
            content:"▼";
        }
        .sort.asc:after {
            content:"▲";
        }

        table#idols{
            border-spacing: 0 4px !important;
        }
        td, th{
            text-align: center;
            font-size: 17px;
        }
        td{
            padding: 2px 0;
            border-bottom-style: solid;
        }
        td:first-child{
            border-left: solid 15px black;
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        td:last-child{
            border-right: solid 15px black;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }
        td.name, td.hiragana, td.alphabet{
            text-align: left;
        }
        td.type{
            font-weight: bold;
        }
        td.princess{
            color: {{ getTypeColor('Princess') }};
        }
        td.fairy{
            color: {{ getTypeColor('Fairy') }};
        }
        td.angel{
            color: {{ getTypeColor('Angel') }};
            text-shadow: 0 0 3px white;
        }
        td.icon > img{
            position: absolute;
            height: 1.5em;
            box-sizing: border-box;
            padding: 1px;
            border-radius: 2px;
            transform: translate(-.4em, -.7em);
            transition: transform .3s;
            z-index: 2;
        }
        td.icon:hover > img{
            transform: scale(3);
            z-index: 3;
        }
        td.icon{
            width: 1.7em;
        }
        td.icon > img.princess{
            background: {{ getTypeColor('Princess') }};
        }
        td.icon > img.fairy{
            background: {{ getTypeColor('Fairy') }};
        }
        td.icon > img.angel{
            background: {{ getTypeColor('Angel') }};
        }
        td.color{
            font-weight: bold;
        }

        .topnavi{
            width: 1860px;
            margin: 0 auto;
        }
    </style>
@endsection

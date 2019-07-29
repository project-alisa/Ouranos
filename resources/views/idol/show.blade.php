@extends('layouts.app',['title' => $idol->name, 'sub' => __('messages.idol.show.desc'), 'css' => 'idol'])

@section('content')
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
                        <th title="データベース内部ID ゲームの内部IDと同一です">データベースID</th><td>{{ $idol->id }}</td>
                    </tr>
                    <tr>
                        <th title="シアターデイズにおけるアイドルの属性です">シアター属性</th><td style="color: {{ getTypeColor($idol->type) }}">{{ $idol->type }}</td>
                    </tr>
                    <tr>
                        <th title="パーソナルカラーの16進表記です">パーソナルカラー</th><td style="color:{{ '#'.($idol->color ?: '000') }}">
                            {{ !empty($idol->color) ? '■ #'.str_replace('#','',$idol->color) : 'N/A' }}
                        </td>
                    </tr>
                </table>
            </div>
            <hr class="gradient">
            <table id="datatable">
                <tr>
                    <?php /** @var \App\Idol $idol */
                    $namestr = separateString($idol->name,$idol->name_separate);
                    if(!empty($idol->subname)) $namestr .= ' ('.$idol->subname.')';
                    $dateflag = \App::isLocale('ja') ? 'ja' : 'slash'; ?>
                    <th>{{ __('Name') }}</th><td colspan="3">{{ $namestr }}</td>
                    <th>{{ __('CV') }}</th><td>{{ $idol->cv }}</td>
                </tr>
                <tr>
                    <th>{{ __('Name y') }}</th><td colspan="5">{{ separateString($idol->name_y,$idol->name_y_separate) }}</td>
                </tr>
                <tr>
                    <th>Alphabet</th><td colspan="5">{{ ucwords(separateString($idol->name_r,$idol->name_r_separate)) }}</td>
                </tr>
                <tr>
                    <th>{{ __('Birthdate') }}</th><td>{{ convertDateString($idol->birthdate,$dateflag) }}</td>
                    <th>{{ __('Height') }}</th><td>{{ $idol->height }}cm</td>
                    <th>{{ __('Blood type') }}</th><td>{{ $idol->bloodtype }}型</td>
                </tr>
                <tr>
                    <th>{{ __('Age') }}</th><td>{{ $idol->age }}歳</td>
                    <th>{{ __('Weight') }}</th><td>{{ $idol->weight }}kg</td>
                    <th>{{ __('Handedness') }}</th><td>{{ $idol->handedness }}</td>
                </tr>
                <tr>
                    <th>{{ __('Birthplace') }}</th><td><a href="javascript:void(0)">{{ $idol->birthplace }}</a></td>
                    <th>BMI</th><td>{{ calcBmi($idol->height,$idol->weight) }}</td>
                    <th>3 size</th><td>{{ $idol->bust.' / '.$idol->waist.' / '.$idol->hip }}</td>
                </tr>
                <tr>
                    <th>{{ __('Hobby') }}</th><td colspan="5">{{ $idol->hobby }}</td>
                </tr>
                <tr>
                    <th>{{ __('Skill') }}</th><td colspan="5">{{ $idol->skill }}</td>
                </tr>
                <tr>
                    <th>{{ __('Favorite') }}</th><td colspan="5">{{ $idol->favorite }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="msgbox">
        <div class="msgboxtop">Idol</div>
        <div class="msgboxbody" style="overflow-x: scroll">
        <pre>
            <?php var_dump($idol); ?>
        </pre>
        </div>
        <div class="msgboxfoot"></div>
    </div>
@endsection
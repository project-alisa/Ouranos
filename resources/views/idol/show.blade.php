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
                        <th title="{{ __('messages.idol.show.dbid') }}">{{ __('Database ID') }}</th><td>{{ $idol->id }}</td>
                    </tr>
                    <tr>
                        <th title="{{ __('messages.idol.show.type') }}">MLTD {{ __('Type') }}</th><td style="color: {{ getTypeColor($idol->type) }}">{{ $idol->type }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Personal Color') }}</th><td style="color:{{ '#'.($idol->color ?: '000') }}">
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
                    $dateflag = App::isLocale('ja') ? 'ja' : 'slash'; ?>
                    <th>{{ __('Name') }}</th><td colspan="3">{{ $namestr }}</td>
                    <th>{{ __('CV') }}</th><td>{{ $idol->cv }}</td>
                </tr>
                <tr>
                    <th>{{ __('Hiragana') }}</th><td colspan="5">{{ separateString($idol->name_y,$idol->name_y_separate) }}</td>
                </tr>
                <tr>
                    <th>Alphabet</th><td colspan="5">{{ ucwords(separateString($idol->name_r,$idol->name_r_separate)) }}</td>
                </tr>
                <tr>
                    <th>{{ __('Birthdate') }}</th><td>{{ convertDateString($idol->birthdate,$dateflag) }}</td>
                    <th>{{ __('Height') }}</th><td>{{ $idol->height }}cm</td>
                    <th>{{ __('Blood type') }}</th><td>{{ $idol->bloodtype }}</td>
                </tr>
                <tr>
                    <th>{{ __('Age') }}</th><td>{{ $idol->age }}{{ !App::isLocale('en') ? __('years old') : '' }}</td>
                    <th>{{ __('Weight') }}</th><td>{{ $idol->weight }}kg</td>
                    <th>{{ __('Handedness') }}</th><td>{{ $idol->handedness }}</td>
                </tr>
                <tr>
                    <th>{{ __('Birthplace') }}</th><td><a href="javascript:void(0)">{{ $idol->birthplace }}</a></td>
                    <th>BMI</th><td>{{ calcBmi($idol->height,$idol->weight) }}</td>
                    <th>{{ __('3 size') }}</th><td>{{ $idol->bust.' / '.$idol->waist.' / '.$idol->hip }}</td>
                </tr>
                <tr>
                    <th>{{ __('Hobby') }}</th>
                    <td colspan="5">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->hobby,App::getLocale()) ?>
                        {{ $idol->hobby }}
                    </td>
                </tr>
                <tr>
                    <th>{{ __('Skill') }}</th>
                    <td colspan="5">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->skill,App::getLocale()) ?>
                        {{ $idol->skill }}
                    </td>
                </tr>
                <tr>
                    <th>{{ __('Favorite') }}</th>
                    <td colspan="5">
                        <?php if(!App::isLocale('ja')) echo genTranslationLink($idol->favorite,App::getLocale()) ?>
                        {{ $idol->favorite }}
                    </td>
                </tr>
            </table>
            <div id="idollinks">
                <div>
                    <h2>{{ __('Encyclopedia') }}</h2>
                    <div class="buttonbox">
                        <a href="https://dic.nicovideo.jp/a/{{ urlencode($idol->name) }}" class="button jwil" target="_blank">
                            {{ __('niconico Pedia') }}
                        </a>
                        <a href="https://dic.pixiv.net/a/{{ urlencode($idol->name) }}" class="button jwil" target="_blank">
                            {{ __('pixiv encyclopedia (ja)') }}
                        </a>
                    </div>
                </div>
                <div>
                    <h2>{{ __('Musics info') }}</h2>
                    <div class="buttonbox">
                        <a href="https://fujiwarahaji.me/idol/765/{{ $idol->name_r }}" class="button jwil" target="_blank">
                            {{ __('fujiwarahaji.me') }}
                            <span class="subline">{{ __('THE IDOLM@STER Musics DB') }}</span>
                        </a>
                    </div>
                </div>
            </div>
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

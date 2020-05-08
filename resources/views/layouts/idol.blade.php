<?php
/** @var App\Idol $idol */
$icon = asset('image/icon/'.$idol->name_r.'/0.png');
if(!$ja_flag){
    $name = 'name_'.((App::isLocale('en') || App::isLocale('zh-CN')) ? 'r' : mb_substr($current_lang,0,2));
    if(empty($idol->$name)) $name = 'name_r'; //fallback
    $separate = $name.'_separate';
    $text = e(ucwords(separateString($idol->$name,$idol->$separate)));
    $text .= "<span class='ja' style='font-size: 15px;color: dimgray;margin-left: 15px'>".e(ucwords(separateString($idol->name,$idol->name_separate)))."</span>";
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
            <th>{{ __('Age') }}</th><td style="width: 70px;">{{ $idol->age ?: 'N/A' }}</td>
            <th>{{ __('Birthdate') }}</th><td>{{ $idol->birthdate ? convertDateString($idol->birthdate,$dateflag) : 'N/A' }}</td>
            <th>{{ __('Color') }}</th><td style="color: {{ '#'.$idol->color }};width: 100px">{{ !empty($idol->color) ? '■ #'.str_replace('#','',$idol->color) : 'N/A' }}</td>
            </tr>
        </table>
    </div>
</a>

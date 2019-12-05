<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function clock(){
        // mastodonRSS取得
        $feed = simplexml_load_file(config('ouranos.mastodonFeedUrl'));
        $feed_txt = preg_replace("{https?://[\w/:%#$&?()~.=+\-]+}",'',strip_tags($feed->channel->item[0]->description));
        $feed_txt .= " (<a href=\"{$feed->channel->item[0]->link}\" target=\"_blank\">";
        $feed_txt .= date('Y/m/d',strtotime($feed->channel->item[0]->pubDate)).'配信'."</a>)";
        // 誕生日
        $birthday = \App\idol::where('birthdate','=',date('2017-m-d'))->get();
        if($birthday->count() !== 0){
            $birth_text = '今日は';
            foreach ($birthday as $idol) $birth_text .= $idol->name.'さん('.$idol->age.'歳)、';
            $birth_text = mb_substr($birth_text,0,mb_strlen($birth_text)-1);
            $birth_text .= 'のお誕生日です';
        }else{
            $birth_text = null;
        }
        // イベント情報
        $events = json_decode(file_get_contents(config('ouranos.matsurihimeEndpointUrl').'/events/?at='.date('c').'&prettyPrint=false'));
        if(count($events)){
            $event_txt = 'ただいま、';
            foreach ($events as $event){
                $event_txt .= '「'.$event->name.'」('.date('m/d H:i T',strtotime($event->schedule->endDate)).' まで)、';
            }
            $event_txt = mb_substr($event_txt,0,mb_strlen($event_txt)-1);
            $event_txt .= 'が開催中です';
        }else{
            $event_txt = '現在開催中のイベントはありません';
        }
        return view('clock',compact('feed_txt','birth_text','event_txt'));
    }

    public function home(){
        $feed = simplexml_load_file(config('ouranos.mastodonFeedUrl'));
        return view('home',compact('feed'));
    }
}

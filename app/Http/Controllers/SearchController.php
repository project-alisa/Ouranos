<?php

namespace App\Http\Controllers;

use App\Idol;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        // Inputの確認
        $name       /* 名前      */ = $request->input('name',false);
        $birthplace /* 出身地    */ = $request->input('birthplace',false);
        $month      /* 誕生日-月 */ = $request->input('month',false);
        $day        /* 誕生日-日 */ = $request->input('day',false);
        $age        /* 年齢      */ = $request->input('age',false);
        $range      /* 年齢範囲  */ = $request->input('range',false);
        if(!($name||$birthplace||$month||$day||$age||$range)){
            // 条件未入力なので検索開始画面を出す
            return view('search.index');
        }

        // 検索開始
        $search = Idol::select();
        $query_info = array();
        if($name){
            $name_flag = (bool)preg_match("/^([ぁ-ゞ]|[ァ-ヴ])+$/u", $name);
            $search = $search->where($name_flag ? 'name_y' : 'name' ,'like',"%{$name}%");
            $query_info[] = array('type' => $name_flag ? 'Hiragana' : 'Name', 'value' => $name);
        }
        if($birthplace){
            switch($birthplace){
                case "東北":
                    $ar = array("青森県","秋田県","岩手県","宮城県","福島県","山形県");
                    break;
                case "関東":
                    $ar = array("東京都","神奈川県","千葉県","埼玉県","神奈川県","茨城県","栃木県","群馬県");
                    break;
                case "中部":
                    $ar = array("新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県");
                    break;
                case "近畿":
                    $ar = array("大阪府","兵庫県","京都府","滋賀県","奈良県","和歌山県","三重県","京都府？");
                    break;
                case "中国":
                    $ar = array("鳥取県","島根県","岡山県","広島県","山口県");
                    break;
                case "四国":
                    $ar = array("香川県","徳島県","愛媛県","高知県");
                    break;
                case "九州沖縄":
                    $ar = array("福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県");
                    break;
                case "海外":
                    $ar = array("イギリス","ブラジル");
                    break;
                default:
                    $ar = array($birthplace);
            }
            $search = $search->whereIn('birthplace',$ar);
            $query_info[] = array('type' => 'Birthplace', 'value' => $birthplace);
        }
        // TODO:日付と年齢
        $search = $search->orderBy('id','asc')->get();
        $search_count = $search->count();
        if($search_count === 1 && $name && !($birthplace||$month||$day||$age||$range)){
            return redirect('/idol/'.$search[0]->name_r)->with('flash_message','リダイレクト:検索結果が1件でした');
        }else{
            return view('search.result',compact('search','query_info','search_count'));
        }
    }
}

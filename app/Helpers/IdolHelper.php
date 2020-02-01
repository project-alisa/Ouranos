<?php

if(!function_exists('separateString')){
    /**
     * 文字列指定位置分割関数
     *
     * 文字列の $position 文字目にスペースを入れる
     *
     * @param $string
     * @param $position
     * @return string
     */
    function separateString($string, $position){
        $last = mb_substr($string,$position);
        $first = mb_substr($string,0,$position);
        return $first." ".$last;
    }
}

if(!function_exists('swapNameOrder')){
    /**
     * 姓名スワップ関数
     *
     * $name を $name_separate 文字目を境にスワップし $glue = ' ' で接続する
     *
     * @param string $name
     * @param $name_separate
     * @param string $glue
     * @return string
     */
    function swapNameOrder(string $name, $name_separate, string $glue = ' '){
        $last = mb_substr($name,$name_separate);
        $first = mb_substr($name,0,$name_separate);
        return $last.$glue.$first;
    }
}

if(!function_exists('genMillTokyoLinkText')){
    /**
     * mill.tokyo向けリンク文字列生成関数
     *
     * configの例外リストに当てはまる場合はそれを、
     * 当てはまらない場合は姓名をスワップしハイフンでつなげた文字列を返す
     *
     * @param string $name
     * @param int $name_separate
     * @return \Illuminate\Config\Repository|mixed|string
     */
    function genMillTokyoLinkText(string $name, int $name_separate){
        if(!empty(config('idol.millTokyoNameExceptionList.'.$name))){
            return config('idol.millTokyoNameExceptionList.'.$name);
        }else{
            return swapNameOrder($name,$name_separate,'-');
        }
    }
}

if(!function_exists('convertDateString')){
    /**
     * 日付変換関数
     *
     * @param $date
     * @param $type
     * @return bool|false|string
     */
    function convertDateString($date, $type){
        switch ($type){
            case 'slash':
                return date('n/j',strtotime($date));
            case 'ja':
                return date('n月j日',strtotime($date));
            case 'ja_year':
                return date('Y年n月j日',strtotime($date));
            default:
                return false;
        }
    }
}

if(!function_exists('getTypeColor')){
    /**
     * 属性色呼び出し関数
     *
     * @param $type
     * @return string
     */
    function getTypeColor($type){
        $type = strtolower($type);
        switch ($type){
            case "fairy":
                return "#005eff";
            case "princess":
                return "#ff2284";
            case "angel":
                return "#ffbb00";
            case "vocal":
                return "deeppink";
            case "dance":
                return "deepskyblue";
            case "visual":
                return "orange";
            default:
                return "#00ff43";
        }
    }
}

if(!function_exists('calcBmi')){
    /**
     * BMI計算関数
     *
     * @param $height
     * @param $weight
     * @return bool|float
     */
    function calcBmi($height,$weight){
        //入力が正の整数であるかチェック
        if(!is_numeric($height)||!is_numeric($weight))return false;
        $hm = $height / 100;
        $bmi = $weight / ($hm * $hm);
        return round($bmi,1);
    }
}

if(!function_exists('genTranslationLink')){
    /**
     * GoogleTranslateリンク生成関数
     *
     * @param string $string
     * @param string $locale
     * @return string
     */
    function genTranslationLink(string $string, string $locale){
        $tag = "<a href='https://translate.google.com/#view=home&op=translate&sl=ja&tl={$locale}&text={$string}' target='_blank' class='button smaller'>";
        $tag .= __('View translation on Google');
        $tag .= "</a>";
        return $tag;
    }
}

if(!function_exists('convertColorcode')){
    /**
     * カラーコード変換関数
     *
     * "#92cfbb" => array(146,207,187) or "146,207,187"
     *
     * @param $code
     * @return bool|array
     */
    function convertColorcode($code,bool $str = false){
        $code = str_replace('#','',$code);
        if(strlen($code) == 6){
            $cc['r'] = hexdec(substr($code, 0, 2));
            $cc['g'] = hexdec(substr($code, 2, 2));
            $cc['b'] = hexdec(substr($code, 4, 2));
            return $str ? $cc['r'].','.$cc['g'].','.$cc['b'] : $cc;
        }else{
            return false;
        }
    }
}

if(!function_exists('translateHandedness')){
    /**
     * 利き手翻訳関数
     *
     * めんどいねんDB変えるの
     *
     * @param $text
     * @return bool|string
     */
    function translateHandedness($text){
        switch ($text){
            case '左':
                return 'Left handed';
            case '右':
                return 'Right handed';
            case '両':
                return 'Both handed';
            default:
                return false;
        }
    }
}

if(!function_exists('getIdolByBithdate')){
    /**
     * 誕生日のアイドルをコレクションで返すやつ
     *
     * @param string|null $date
     * @return mixed
     */
    function getIdolByBirthdate(string $date = null){
        $date = date('2017-m-d',strtotime($date) ?? time());
        return \App\Idol::where('birthdate','=',$date)->get();
    }
}

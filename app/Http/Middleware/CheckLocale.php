<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
{
    /**
     * Available languages
     *
     * 許容単語リスト
     *
     * @var array
     */
    private $langs = array('ja','en');

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // envがtestingならenに固定
        if(\App::environment('testing')){
            \App::setLocale('en');
            return $next($request);
        }

        $locale = '';
        if(!empty($_GET['lang'])){
            $locale = $_GET['lang'];
        }else{
            $locale = session('locale');

            if(empty($locale) && !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
                $locale = substr(locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']),0,2);
                // locale_accept_from_http は en_US みたいなのを返却するので頭2文字を切り出す
            }
        }

        if(!in_array($locale,$this->langs,true)){
            $locale = config('app.locale');
            // 許容リストになければとりあえずデフォ言語にしとく
        }

        session(['locale' => $locale]);
        \App::setLocale($locale);
        // セッションにぶち込みロケール変更し次へ

        return $next($request);
    }
}

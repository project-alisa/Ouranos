@extends('layouts.app',['title' => '埋め込みパーツ', 'sub' => 'アイドルの紹介にご利用いただける埋め込みパーツを公開しています'])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">アイドル情報</div>
                <div class="msgboxbody">
                    <p>
                        アイドルの紹介にご利用いただける埋め込みパーツです。
                    </p>
                    <h2>使用例・コード</h2>
                    <p>
                        ページソースは <code>/blogparts/idol?id={アイドルのDatabase ID}</code> で指定してください。
                    </p>
                    <div class="exandcode">
                        <div class="example"><iframe src="{{ url('/blogparts/idol?id='.$idol_id) }}" width="312" height="176" style="border: solid 1px gray"></iframe></div>
                        <label>HTMLコード(クリックしてコードを全選択)
                            <textarea readonly class="textarea" onclick="this.select();"><iframe src="{{ url('/blogparts/idol?id='.$idol_id) }}" width="312" height="176" style="border: solid 1px gray"></iframe></textarea>
                        </label>
                    </div>
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">埋め込みパーツについて</div>
                <div class="msgboxbody">
                    <h3>概要</h3>
                    <p>
                        HTMLのiframe(インラインフレーム)要素でパーツを呼び出せます。<br>
                        ニコニコの埋め込みと同じサイズです。
                    </p>
                    <h3>使い方</h3>
                    <p>
                        パーツを貼り付けたい場所へ表示されているコードをコピー＆ペーストしてください。
                        アイドルのIDなどは適宜読み替えてください。
                    </p>
                </div>
                <div class="msgboxfoot"></div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .exandcode{
            display: flex;
            align-content: space-around;
            padding: 10px;
        }
        .example{
            padding-right: 20px;
        }
        .textarea{
            position: relative;
            width: 530px;
            min-height: 140px;
            height: auto;
            box-sizing: border-box;
            text-align: left;
        }
        .textarea::after{
            position: absolute;
            /*bottom: 10px;*/
            /*right: 20px;*/
            content: 'クリックしてコードを選択';
            color: gray;
        }
    </style>
@endsection

@extends('layouts.app',['title' => __('About this site')])

@section('style')
    <style>
        dl{
            font-size: 18px;
        }
        dt::before{
            content: 'Q.';
            margin-right: 3px;
            font-size: 20px;
            color: blue;
        }
        dd::before{
            content: 'A.';
            margin-right: 3px;
            font-size: 20px;
            color: red;
        }
        th{
            text-align: right;
            width: 30%;
        }
    </style>
@endsection

@section('content')
<div class="msgbox">
    <div class="msgboxtop">{{ __('About this site') }}</div>
    <div class="msgboxbody">
        <div style="display: flex;align-items: center;justify-content: center;margin: 25px auto">
            <img src="{{ asset('image/icon/'.$selected_idol->name_r.'/0.png') }}"
                 alt="{{ $selected_idol->name }}" title="{{ separateString($selected_idol->name,$selected_idol->name_separate) }}"
                 style="margin-right: 30px;width: 120px;filter: drop-shadow(0 0 5px rgba(0,0,0,0.2))">
            <div>
                <p style="font-size: 27px;">
                    MillionLivePortalへようこそ！
                </p>
                <p style="font-size: 18px;color: gray">
                    Welcome to MillionLivePortal!<br>
                    MillionLivePortal에 오신 것을 환영합니다!
                </p>
            </div>
        </div>
        <hr>
        @if(\App::isLocale('ja'))
        <h2>MillionLivePortalとは？</h2>
        <p>{{ __('messages.home.description') }}</p>
        <p>
            アイドルのプロフィール検索はもちろんのこと、そこからニコニコ動画、pixivなどの動画・イラストを検索したり、
            ニコニコ大百科やピクシブ百科事典にジャンプしてさらに詳しく調べたり、
            ふじわらはじめ(アイマス楽曲DB)で歌っている曲を探したり、ミリシタのカードを探したりできます。
        </p>
        <hr>
        <h2>よくありそうなご質問</h2>
        <dl>
            <dt>どんなことができますか？</dt>
            <dd>
                なんかいろいろできます。<br>
                アイドルのプロフィール検索はもちろんのこと、詳細ページからニコニコやpixivなどの検索へ遷移することも、
                <a href="https://fujiwarahaji.me" target="_blank">ふじわらはじめ(アイマス楽曲DB)</a>
                で歌唱している曲を検索することも可能です。
            </dd>
        </dl>
        <dl>
            <dt>管理人は誰ですか？</dt>
            <dd>
                個人サークル<a href="https://miyacorata.net" target="_blank">宮野路快速</a>(代表：宮野慧)が開発・運営しています。
                BNEIほか関連会社と無関係の非公式ファンサイトです。
            </dd>
        </dl>
        <dl>
            <dt>何語で利用できますか？</dt>
            <dd>
                日本語と英語、あと韓国語の一部に対応しています。(2019年12月現在)
                ページ左下の言語メニューで選べます。<br>
                そのうち中国語(繁体字)も対応したいですが管理人は中国語がわかりません...
                翻訳を手伝ってくれるプロデューサーさんはぜひお知らせください。
            </dd>
        </dl>
        <dl>
            <dt>ところでページ上にいるアイドルは誰ですか？</dt>
            <dd>
                <a href="{{ url('/idol/'.$selected_idol->name_r) }}">{{ $selected_idol->name }}</a>さんです。
                早速リンクをクリックしてもっと詳しい情報を見に行きましょう！
            </dd>
        </dl>

        <hr>
        <h2>Please help us!</h2>
        <p>
            このサイトの韓国語・また中国語(繁体字)への翻訳をお手伝いしていただける方を探しています。<br>
            翻訳に不自然な点があった場合はぜひGitHubリポジトリの
            <a href="https://github.com/project-alisa/Ouranos/issues/new?assignees=&labels=translation&template=translation-update-request.md&title=%5BTranslation%5D+" target="_blank">Issue</a>
            からお知らせください。
        </p>
        <p>
            MillionLivePortalはPHPのフレームワークLaravelをベースにしたシステム
            <a href="https://github.com/project-alisa/Ouranos" target="_blank">Ouranos</a>
            で構築されており、翻訳ファイルを書き換えることでさまざまな言語に対応できます。<br>
            もしGitHubを使ったことがあるなら、翻訳ファイルを修正あるいは追加したPullRequestを出していただくのが最も速く確実な方法です。
        </p>
        @else
            <h2>What is MillionLivePortal?</h2>
            <p>{{ __('messages.home.description') }}</p>
            <h2>Please help us!</h2>
            <p>
                MLP is looking for someone to help translate this website. (Japanese to Korean and to Traditional Chinese)<br>
                Please tell us by GitHub issue if you find mistake or missing translation.
            </p>
        @endif
        <hr>
        <h3>About MillionLivePortal</h3>
        <table>
            <tr><th>Site Name</th><td>{{ config('ouranos.sitename') }}</td></tr>
            <tr>
                <th>Developer and Operator</th>
                <td>{{ \App::isLocale('ja') ? '宮野 慧' : 'K Miyano' }} (<a href="https://github.com/miyacorata" target="_blank">miyacorata</a>)</td></tr>
            <tr><th>Web system</th><td>{{ config('app.name') }} (<a href="{{ config('ouranos.repositoryUrl') }}" target="_blank">GitHub Repository</a>)</td></tr>
            <tr><th>System version</th><td>{{ 'Ver'.config('ouranos.version').' - '.config('ouranos.phrase') }}</td></tr>
            <tr><th>API Powered by</th><td><a href="https://matsurihi.me">matsurihi.me</a></td></tr>
        </table>
    </div>
    <div class="msgboxfoot"></div>
</div>
@endsection

@extends('layouts.app',['title' => __fb('About this site')])

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
            width: 20%;
        }
    </style>
@endsection

@section('content')
<div class="msgbox">
    <div class="msgboxtop">{{ __fb('About this site') }}</div>
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
            <p>{{ __fb('messages.home.description') }}</p>
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
                    現在、以下の言語で利用できます。
                    <p class="notification">
                        @foreach(config('ouranos.acceptableLangs') as $lang)
                            {{ __fb('locale.'.$lang) }}
                        @endforeach
                        {{ '：計'.count(config('ouranos.acceptableLangs')).'言語' }}
                    </p>
                    ページ左下の言語メニューで選べます。<br>
                    対応言語は随時増やしたいと思っています。 翻訳を手伝ってくれるプロデューサーさんはぜひお知らせください。
                    →<a href="{{ config('ouranos.footerLinkUrls.Crowdin') }}" target="_blank">Crowdin</a>
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
                からお知らせいただくか、翻訳プラットフォーム<a href="{{ config('ouranos.footerLinkUrls.Crowdin') }}" target="_blank">Crowdin</a>をお使いいただけます。
            </p>
            <p>
                MillionLivePortalはPHPのフレームワークLaravelをベースにしたシステム
                <a href="https://github.com/project-alisa/Ouranos" target="_blank">Ouranos</a>
                で構築されており、翻訳ファイルを書き換えることでさまざまな言語に対応できます。<br>
                現在各言語への翻訳作業は<a href="{{ config('ouranos.footerLinkUrls.Crowdin') }}" target="_blank">Crowdin</a>で行われています。
            </p>
            <a title="Crowdin" target="_blank" href="https://crowdin.com/project/ouranos"><img src="https://badges.crowdin.net/ouranos/localized.svg"></a>
        @else
            <h2>What is MillionLivePortal?</h2>
            <p>{{ __fb('messages.home.description') }}</p>
            <h2>Please help us!</h2>
            <p>
                MLP is looking for someone to help translate this website.<br>
                Please tell us by GitHub issue or by <a href="{{ config('ouranos.footerLinkUrls.Crowdin') }}" target="_blank">Crowdin</a>
                if you find mistake or missing translation.
            </p>
            <a title="Crowdin" target="_blank" href="https://crowdin.com/project/ouranos"><img src="https://badges.crowdin.net/ouranos/localized.svg"></a>
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
            <tr>
                <th>Special Thanks</th>
                <td>
                    <strong>Translator :</strong> 夜楓Yoka (zh)
                </td>
            </tr>
        </table>
    </div>
    <div class="msgboxfoot"></div>
</div>
@endsection

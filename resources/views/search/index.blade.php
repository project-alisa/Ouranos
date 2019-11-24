@extends('layouts.app',['title' => __('Search'), 'sub' => __('messages.search.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __('Search') }}</div>
                <div class="msgboxbody">
                    <h2>名前で検索</h2>
                    <form action="{{ url('/search') }}" method="get" name="name" style="text-align: center">
{{--                        <input type="hidden" name="type" value="name">--}}
                        <input type="search" name="name" class="textarea" required style="width: 300px" title="名前" placeholder="名前">
                        <input type="submit" value="検索" class="button">
                    </form>
                    <p class="notification">
                        漢字かよみがなで検索できます。<br>
                        検索結果が1件の場合は該当するアイドルのページに自動的に遷移します。
                    </p>
                    <h2>出身地で検索</h2>
                    <form action="{{ url('/search') }}" method="get" name="birthplace" style="text-align: center">
{{--                        <input type="hidden" name="type" value="birthplace">--}}
                        <select name="birthplace" title="出身地を選択">
                            <option value="">選択してください</option>
                            <optgroup label="北海道地方">
                                <option value="北海道">北海道</option>
                            </optgroup>
                            <!--<optgroup label="東北地方">
                                <option value="東北">東北地方全域</option>
                                <option value="青森">青森</option>
                                <option value="岩手">岩手</option>
                                <option value="宮城">宮城</option>
                                <option value="秋田">秋田</option>
                                <option value="山形">山形</option>
                                <option value="福島">福島</option>
                            </optgroup>-->
                            <optgroup label="関東地方">
                                <option value="関東">関東地方全域</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="茨城県">茨城県</option>
                                <!--<option value="栃木">栃木</option>
                                <option value="群馬">群馬</option>-->
                            </optgroup>
                            <optgroup label="中部地方">
                                <option value="中部">中部地方全域</option>
                                <!--<option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>-->
                                <option value="石川県">石川県</option>
                                <!--<option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>-->
                                <option value="長野県">長野県</option>
                                <!--<option value="岐阜県">岐阜県</option>-->
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                            </optgroup>
                            <!--<optgroup label="中部地方 - 都市名">
                                <option value="名古屋">名古屋</option>
                            </optgroup>-->
                            <optgroup label="近畿地方">
                                <option value="近畿">近畿地方全域</option>
                                <option value="大阪府">大阪府</option>
                                <!--<option value="兵庫県">兵庫県</option>
                                <option value="京都府">京都府</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="三重県">三重県</option>-->
                            </optgroup>
                            <optgroup label="近畿地方 - 不詳">
                                <option value="京都府？">京都府？</option>
                            </optgroup>
                            <optgroup label="中国地方">
                                <option value="中国">中国地方全域</option>
                                <!--<option value="鳥取">鳥取</option>
                                <option value="島根">島根</option>
                                <option value="岡山">岡山</option>-->
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                            </optgroup>
                            <optgroup label="四国地方">
                                <option value="四国">四国地方全域</option>
                                <!--<option value="徳島">徳島</option>
                                <option value="香川">香川</option>-->
                                <option value="愛媛県">愛媛県</option>
                                <!--<option value="高知">高知</option>-->
                            </optgroup>
                            <optgroup label="九州沖縄地方">
                                <option value="九州沖縄">九州沖縄地方全域</option>
                                <option value="福岡県">福岡県</option>
                                <!--<option value="佐賀">佐賀</option>
                                <option value="長崎">長崎</option>
                                <option value="熊本">熊本</option>
                                <option value="大分">大分</option>
                                <option value="宮崎">宮崎</option>
                                <option value="鹿児島">鹿児島</option>
                                <option value="沖縄">沖縄</option>-->
                            </optgroup>
                            <optgroup label="海外">
                                <option value="海外">海外すべて</option>
                                <option value="イギリス">イギリス</option>
                                <option value="ブラジル">ブラジル</option>
                                <option value="オーストリア">オーストリア</option>
                            </optgroup>
                        </select>
                        <input type="submit" value="検索" class="button">
                    </form>
                    <p class="notification">
                        アイドルの出身地で検索できます。
                    </p>
                    <h2>誕生日で検索</h2>
                    <form action="{{ url('/search') }}" method="get" name="birthday" style="text-align: center">
{{--                        <input type="hidden" name="type" value="birthday">--}}
                        <select name="month" title="誕生月">
                            <option value="u" selected>-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select><span style="margin:0 4px">月</span>
                        <select name="day" title="誕生日">
                            <option value="u" selected>-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select><span style="margin:0 4px">日</span>
                        <input type="submit" value="検索" class="button">
                    </form>
                    <p class="notification">
                        -のままにすることで月のみ、日のみの検索もできます。<br>
                        (例：8月生まれすべてを検索、月を指定せず27日生まれを検索)<br>
                        必ず月か日片方は指定する必要があります。
                    </p>
                    <h2>年齢で検索</h2>
                    <form action="{{ url('/search') }}" method="get" style="text-align:center;">
{{--                        <input type="hidden" name="type" value="age">--}}
                        <input type="number" name="age" title="年齢(整数)" placeholder="年齢(整数)" class="textarea" max="40" min="0" required style="width: 100px;padding-left:15px">
                        <span style="margin: 4px 0;font-weight: bold">歳</span>
                        <select name="range" class="select" title="年齢の範囲">
                            <option value="higher">以上</option>
                            <option value="equal" selected>である</option>
                            <option value="lower">以下</option>
                        </select>
                        <input type="submit" value="検索" class="button">
                    </form>
                    <p class="notification">
                        整数のみ入力できます。もし修飾語がある場合は整数部分のみを入力してください。
                    </p>
                </div>
                <div class="msgboxfoot">
                    <a href="javascript:searchByAllCondition()" class="button jw">すべての条件で検索</a>
                    <script>
                        function searchByAllCondition(){
                            alert('もうちょいまってね');
                        }
                    </script>
                </div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">Inform@tion</div>
                <div class="msgboxbody">
                    <h3>実装中です</h3>
                    <p>すべての条件で検索は実装中です。ごめんね。</p>
                </div>
                <div class="msgboxfoot">
                    <a class="button jw" href="javascript:location.reload()">リセット</a>
                </div>
            </div>
        </div>
    </div>


@endsection

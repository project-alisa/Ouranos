@extends('layouts.app',['title' => __fb('Search'), 'sub' => __fb('messages.search.index.desc')])

@section('content')
    <div id="twinbox">
        <div id="contentwide">
            <div class="msgbox">
                <div class="msgboxtop">{{ __fb('Search') }}</div>
                <div class="msgboxbody">
                    <h2>{{ __fb('search-index.name.header') }}</h2>
                    <form action="{{ url('/search') }}" method="get" name="name" style="text-align: center">
                        <input type="search" name="name" class="textarea" required style="width: 300px" title="{{ __fb('Name') }}" placeholder="{{ __fb('Name') }}">
                        <input type="submit" value="{{ __fb('Search') }}" class="button">
                    </form>
                    <p class="notification">
                        {{ __fb('search-index.name.notice.0') }}<br>{{ __fb('search-index.name.notice.1') }}
                    </p>
                    <h2>{{ __fb('search-index.birthplace.header') }}</h2>
                    <form action="{{ url('/search') }}" method="get" name="birthplace" style="text-align: center">
                        <select name="birthplace" title="出身地を選択">
                            <option value="" disabled selected>選択してください</option>
                            <optgroup label="北海道地方">
                                <option value="北海道">北海道</option>
                            </optgroup>
                            <optgroup label="東北地方">
                                <option value="null" disabled style="background: rgba(0,0,0,0.2)">該当なし</option>
                                <!--<option value="東北">東北地方全域</option>
                                <option value="青森">青森</option>
                                <option value="岩手">岩手</option>
                                <option value="宮城">宮城</option>
                                <option value="秋田">秋田</option>
                                <option value="山形">山形</option>
                                <option value="福島">福島</option>-->
                            </optgroup>
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
                            <optgroup label="近畿地方？">
                                <option value="京都府？">京都府？</option>
                            </optgroup>
                            <optgroup label="中国地方">
                                <option value="中国">中国地方全域</option>
                                <!--<option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>-->
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                            </optgroup>
                            <optgroup label="四国地方">
                                <option value="四国">四国地方全域</option>
                                <!--<option value="徳島県">徳島県</option>-->
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <!--<option value="高知県">高知県</option>-->
                            </optgroup>
                            <optgroup label="九州沖縄地方">
                                <option value="九州沖縄">九州沖縄地方全域</option>
                                <option value="福岡県">福岡県</option>
                                <!--<option value="佐賀県">佐賀</option>
                                <option value="長崎県">長崎</option>
                                <option value="熊本県">熊本</option>
                                <option value="大分県">大分</option>
                                <option value="宮崎県">宮崎</option>
                                <option value="鹿児島県">鹿児島</option>-->
                                <option value="沖縄県">沖縄県</option>
                            </optgroup>
                            <optgroup label="海外">
                                <option value="海外">海外すべて</option>
                                <option value="イギリス">イギリス</option>
                                <option value="ブラジル">ブラジル</option>
                                <option value="オーストリア">オーストリア</option>
                            </optgroup>
                            <optgroup label="不詳">
                                <option value="不明">不明</option>
                            </optgroup>
                        </select>
                        <input type="submit" value="{{ __fb('Search') }}" class="button">
                    </form>
                    <p class="notification">
                        {{ __fb('search-index.birthplace.notice') }}
                    </p>
                    <h2>{{ __fb('search-index.birthdate.header') }}</h2>
                    <form action="{{ url('/search') }}" method="get" name="birthday" style="text-align: center">
                        <select name="month" title="{{ __fb('Month') }}">
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
                        </select><span style="margin:0 4px">{{ App::isLocale('ja') ? '月' : '/' }}</span>
                        <select name="day" title="{{ __fb('Day') }}">
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
                        </select><span style="margin:0 4px">{{ App::isLocale('ja') ? '日' : '' }}</span>
                        <input type="submit" value="{{ __fb('Search') }}" class="button">
                    </form>
                    <p class="notification">
                        {{ __fb('search-index.birthdate.notice.0') }}<br>
                        {{ __fb('search-index.birthdate.notice.1') }}<br>
                        {{ __fb('search-index.birthdate.notice.2') }}
                    </p>
                    <h2>{{ __fb('search-index.age.header') }}</h2>
                    <form action="{{ url('/search') }}" method="get" name="age" style="text-align:center;">
                        <input type="number" name="age" title="{{ __fb('search-index.age.input') }}" placeholder="{{ __fb('search-index.age.input') }}" class="textarea" max="40" min="10" required style="width: 110px;padding-left:15px">
                        <span style="margin: 4px 0;font-weight: bold">{{ __fb('years old') }}</span>
                        <select name="range" class="select" title="{{ __fb('search-index.age.range') }}">
                            <option value="higher">{{ __fb('search-index.age.range.older') }}</option>
                            <option value="equal" selected>{{ __fb('search-index.age.range.equal') }}</option>
                            <option value="lower">{{ __fb('search-index.age.range.younger') }}</option>
                        </select>
                        <input type="submit" value="{{ __fb('Search') }}" class="button">
                    </form>
                    <p class="notification">
                        {{ __fb('search-index.age.notice') }}
                    </p>
                </div>
                <div class="msgboxfoot">
                    <a href="javascript:searchByAllCondition()" class="button jw">{{ __fb('search-index.searchbyallcond') }}</a>
                    <script>
                        function searchByAllCondition(){
                            var url = location.pathname+'?';
                            if(document.forms.name.name.value) url += 'name=' + document.forms.name.name.value + '&';
                            if(document.forms.birthplace.birthplace.value) url += 'birthplace=' + document.forms.birthplace.birthplace.value + '&';
                            if(document.forms.birthday.month.value !== 'u' || document.forms.birthday.day.value !== 'u')
                                url += 'month=' + document.forms.birthday.month.value + '&day=' + document.forms.birthday.day.value + '&';
                            if(document.forms.age.age.value) url += 'age=' + document.forms.age.age.value + '&range=' + document.forms.age.range.value + '&';
                            location.href = url.substr(0,url.length-1);
                        }
                    </script>
                </div>
            </div>
        </div>
        <div id="contentnarrow">
            <div class="msgbox">
                <div class="msgboxtop">Inform@tion</div>
                <div class="msgboxbody">
                    <h3>{{ __fb('How to use') }}</h3>
                    <p>{{ __fb('search-index.howtouse') }}</p>
                </div>
                <div class="msgboxfoot">
                    <a class="button jw" href="javascript:location.reload()">{{ __fb('Reset') }}</a>
                </div>
            </div>
        </div>
    </div>


@endsection

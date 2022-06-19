<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <title>比較Phone</title>
    <link rel="stylesheet" href="/css/mypage.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function() {
            $('#logout').click(function() {
                if(window.confirm("ログアウトしますか？")) {
                    return true;
                }else{
                    return false;
                }
            })
        });
    </script>
</head>

<div class="out">
    <div class="inner">
        <header>
            <h1><a href="/HikakuPhone">比較Phone</a></h1>
            <h2>マイページ</h2>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="{{$auths->name}}" id="logout">
            </form>
        </header>

        <body>
            <div class="wrapper">
                <div class="prof">
                    <form action="/HikakuPhone/Mypage/edit" method="get">
                        @csrf
                        <h1>プロフィール</h1>
                        <p>{{$auths->name}}</p>
                        <table border="1" class="common">
                            <tr>   
                                    <th>インターネット</th>
                                    <td>{{$Common_net}}</td>
                            </tr>
                            <tr>   
                                    <th>クレジットカード</th>
                                    <td>{{$Common_card}}</td>
                            </tr>
                            <tr>   
                                    <th>契約台数</th>
                                    <td>{{$Common_member}}</td>
                            </tr>
                        </table>
                            <button type="submit">ユーザー情報編集</button>
                    </form>
                </div>
            </div>    
        
            <div class="view">
                <h1>保存一覧</h1>
                <div class="Menu">
                    <ul class="menu">
                        <li>
                            <ul class="menuSub">
                            <div class="flex">
                                <div class="list">
                                    <li id="list"><a href="/HikakuPhone/Mypage">保存一覧</a><br></li>
                                </div>
                                <div class="list">
                                    <li id="low"><a href="/HikakuPhone/Mypage/low">安い順</a></li>
                                </div>
                                <div class="list">
                                    <li id="high"><a href="/HikakuPhone/Mypage/high">高い順</a></li>
                                </div>
                            </div>
                            </ul>
                        </li>
                    </ul>
                </div>

                <form class="search">
                        <div class="from">
                            <input type="search" class="form-control" name="search" value="{{request('search')}}" placeholder="キャリア名を入力してください" aria-label="検索" size="23">
                        </div>
                        <input type="submit" value="検索" class="search-btn">
                </form>

                <div class="wrapper">
                    <table border="1" class="save">
                        <tr>   
                            <th>キャリア名</th>
                            <th>プラン名</th>
                            <th>プラン料金</th>
                            <th>通話オプション</th>
                            <th>通話料金</th>
                            <th>ネット割</th>
                            <th>家族割</th>
                            <th>カード割</th>
                            <th>学割</th>
                            <th class="total">合計</th>
                        </tr>
                    @if($Save_Carriers[0] == '保存されていません')
                        <tr>
                            <td>{{$Save_Carriers[0]}}</td>
                            <td>{{$Save_Names[0]}}</td>
                            <td class="price">{{$Save_Prices[0]}}</td>
                            <td>{{$Save_TellNames[0]}}</td>
                            <td class="price">{{$Save_TellPrices[0]}}</td>
                            <td class="price">{{$Save_Nets[0]}}</td>
                            <td class="price">{{$Save_Members[0]}}</td>
                            <td class="price">{{$Save_Cards[0]}}</td>
                            <td class="price">{{$Save_Students[0]}}</td>
                            <td class="price">{{$Save_Totals[0]}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$Save_Carriers[0]}}</td>
                            <td>{{$Save_Names[0]}}</td>
                            <td class="price">{{$Save_Prices[0]}}円</td>
                            <td>{{$Save_TellNames[0]}}</td>
                            <td class="price">+{{$Save_TellPrices[0]}}円</td>
                            <td class="price">-{{$Save_Nets[0]}}円</td>
                            <td class="price">-{{$Save_Members[0]}}円</td>
                            <td class="price">-{{$Save_Cards[0]}}円</td>
                            <td class="price">-{{$Save_Students[0]}}円</td>
                            <td class="price">-{{$Save_Totals[0]}}円</td>
                        </tr>
                        @for($i=1; $i < $count; $i++)
                            <tr>   
                                <td>{{$Save_Carriers[$i]}}</td>
                                <td>{{$Save_Names[$i]}}</td>
                                <td class="price">{{$Save_Prices[$i]}}円</td>
                                <td>{{$Save_TellNames[$i]}}</td>
                                <td class="price">+{{$Save_TellPrices[$i]}}円</td>
                                <td class="price">-{{$Save_Nets[$i]}}円</td>
                                <td class="price">-{{$Save_Members[$i]}}円</td>
                                <td class="price">-{{$Save_Cards[$i]}}円</td>
                                <td class="price">-{{$Save_Students[$i]}}円</td>
                                <td class="price">-{{$Save_Totals[$i]}}円</td>
                            </tr>
                        @endfor
                    @endif     
                    </table>
                </div>
            </div>
        </body>
    </div>
</div>
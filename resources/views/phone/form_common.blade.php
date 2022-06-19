<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <title>比較Phone</title>
    <link rel="stylesheet" href="/css/form_common.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<div class="out">
    <div class="inner">
        <header>
            <h1><a href="/HikakuPhone">比較Phone</a></h1>
            <h2>入力フォーム</h2>
            @if(isset($auths))
                <a href="/HikakuPhone/Mypage">{{$auths->name}}</a>
            @endif
        </header>

        <body>
            <form action="/HikakuPhone/form" method="post">
                @csrf
                <div class="common">
                    <h1>現在利用状況を入力してください</h1>
                    <span>インターネット回線:</span>
                    <select name="net" id="net">
                        @foreach($nets as $net)
                        <option value="{{$net}}">
                            {{$net}}
                        </option>
                        @endforeach
                    </select><br>

                    <span>クレジットカード:</span>
                    <select name="card" id="card">
                        @foreach($cards as $card)
                        <option value="{{$card}}">
                            {{$card}}
                        </option>
                        @endforeach
                    </select><br>

                    <span>契約台数:</span>
                    <select name="member" id="mem">
                        @foreach($members as $member)
                        <option value="{{$member}}">
                            {{$member}}
                        </option>
                        @endforeach
                    </select><br>
                </div>

                <div class="btn">
                    <button type="submit">詳細入力</button>
                </div>   
            </form> 

        </body>
    </div>
</div>
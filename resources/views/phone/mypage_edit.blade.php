<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <title>比較Phone</title>
    <link rel="stylesheet" href="/css/edit.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<div class="out">
    <div class="inner">
        <header>
            <h1><a href="/HikakuPhone">比較Phone</a></h1>
            <h2>編集フォーム</h2>
            <a href="/HikakuPhone/Mypage">{{$auths->name}}</a>
        </header>

        <body>
            <form action="/HikakuPhone/Mypage/edit_store" method="post">
                @csrf
                <div class="common">
                    <span>名前:</span><input type="text" name="name"><br>
                    <span>メール:</span><input type="text" name="email"><br>
                    <span>パスワード:</span><input type="text" name="password"><br><br>

                    <p id="alert">※以下の編集を行うと保存されたデータは削除されます。</p>
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
                    <button type="submit">変更</button>
                </div>   
            </form> 

            
        </body>
    </div>
</div>
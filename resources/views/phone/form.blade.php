<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <title>比較Phone</title>
    <link rel="stylesheet" href="/css/form.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script type="text/javascript">
    function goServletB(){
        document.getElementById('form').action="/HikakuPhone/au";
    }

    function goServletC(){
        document.getElementById('form').action="/HikakuPhone/SoftBank";
    }
    function goServletD(){
        document.getElementById('form').action="/HikakuPhone/UQ";
    }
    function goServletE(){
        document.getElementById('form').action="/HikakuPhone/Y!mobile";
    }
</script>
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
            <form action="/HikakuPhone/Docomo" method="post" id="form">
                @csrf
                <div class="common">
                    <span>インターネット回線:</span>
                    <p>{{$getNet}}</p>

                    <span>クレジットカード:</span>
                    <p>{{$getCard}}</p>

                    <span>契約台数:</span>
                    <p>{{$getMem}}台</p>

                    <div class="btn1">
                        <button type="button"  onclick=history.back()>修正</button>
                    </div>
                </div>

                <div class="wrapper">
                    @csrf
                        @for($i=1; $getMem >= $i; $i++)
                        <div class="one">
                            <h1>{{$i}}台目</h1> 
                                <input type="hidden" name="net" value="{{$getNet}}">
                                <input type="hidden" name="card" value="{{$getCard}}">
                                <input type="hidden" name="member" value="{{$getMem}}">
                                <span>現在の料金:　　</span><input type="text" name="now{{$i}}">円/月<br>
                                <span>年齢:　　　　　</span><input type="text" name="age{{$i}}"><br>
                                <span>使用容量:　　　</span><input type="text" name="GB{{$i}}">GB/月<br>
                                <span>通話オプション:</span>
                                    <select name="tell{{$i}}">
                                        <option>20円/30秒</option>
                                        <option>１回５分以内 無料</option>
                                        <option>かけ放題</option>
                                        <option>1回10分以内 無料</option>
                                        <option>月間60分未満 無料 (UQのみ)</option>
                                    </select>
                        </div>
                        @endfor

                    <div class="btn">
                        <button type="submit" name="Docomo">Docomo</button>
                        <button type="submit" name="au" onclick="goServletB();">au</button>
                        <button type="submit" name="SoftBank" onclick="goServletC();">SoftBank</button>
                        <button type="submit" name="UQ" onclick="goServletD();">UQ</button>
                        <button type="submit" name="Y!moblie" onclick="goServletE();">Y!moblie</button>
                    </div>    
            </form>
        </body>
    </div>
</div>
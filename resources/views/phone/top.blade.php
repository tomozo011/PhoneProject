<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <title>比較Phone</title>
    <link rel="stylesheet" href="css/top.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#drawer_toggle').click(function() {
                $(this).toggleClass("open");
                $("#header").toggleClass("open");
                $("#global_nav").toggleClass("open");
                $("#global_nav").slideToggle();
            });
        })
        
    </script>
</head>


    <header id="header" class>
        <h1>比較Phone</h1>
        <div class="btn">
            <form action="/HikakuPhone/form_common" method="get">
                <button><a>比較開始</a></button>
            </form>
        </div>
        <div class="menu">
            <div id="drawer_toggle" class>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav id="global_nav" class=>
                <form action="/HikakuPhone/register" method="get">
                    <button id=register>新規登録</button>
                </form>
                <form action="/HikakuPhone/login" method="get">
                    <button id="login">ログイン</button>
                </form>
                <form action="{{$link}}" meth="get">
                    <button id="page">マイページ</button>
                </form>
            </nav>
        </div>
            
    </header>

<div class="out">
    <div class="inner">
        <body>
            <div class="ques1">
                <ul>
                    <li>スマホの料金プランはややこしい。</li>
                </ul>
            </div>
            <div class="ques2">
                <ul>
                    <li>どこが安いのかわからない。</li>
                </ul>
            </div>

            <div class="pic">
                <img src="/img/syokku.png">
            </div>

            <div class="ques3">
                <h1>と感じていませんか？</h1>
                <h1>そのお悩みを全て解消します。</h1>
            </div>

            <div class="ans">
                <h1>当サイトの特徴</h1>
            </div>    
            <div class="ans1">
                <p>大手携帯会社を徹底比較</p>
            </div>
            <div class="ans2">
                <p>元携帯販売員が監修</p>
            </div>
            
            <div class="pic">
                <img id="ans_img" src="/img/maru.png">
            </div>

            <div class="ans">
                <h1>使い方</h1>
            </div>
                <div class="text">
                    <p><span>1.</span>契約しているインターネット回線、支払先クレジットカード、契約台数を入力してください。</p>
                    <span class="act">※クレジットカード情報の入力はありません。</span>    
                </div>
                <div class="img">
                    <img src="/img/yajirushi.png">
                <div>

                <div class="text">
                    <p><span>2.</span>現在の携帯料金比較、年齢、使用GB数、通話オプションを入力してください。</p>
                </div>
                <div class="img">
                    <img src="/img/yajirushi.png">
                <div>

                <div class="text">
                    <p><span>3.</span>料金が表示されます。</p>
                    <p>ページトップのボタンからキャリアを切り替えることができます。</p>
                    <span class="act">・表示される料金は、あくまで目安です。</span><br>
                    <span class="act">・ahomo、povo、LINEMOには対応していません。</span>
                </div>
            
            <div class="end">
                <div class="btn">
                    <form action="/HikakuPhone/form_common" method="get">
                        <button><a>比較開始</a></button>
                    </form>
                </div>
            <div>
        </body>
    </div>
</div>
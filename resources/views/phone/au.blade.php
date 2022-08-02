<!DOCTYPE html>
<head>
    <html lang="ja">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>比較Phone</title>
    <link rel="stylesheet" href="/css/au.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){
            $('#drawer_toggle').click(function() {
                $(this).toggleClass("open");
                $("#header").toggleClass("open");
                $("#global_nav").toggleClass("open");
                $("#global_nav").slideToggle();
            });

            var req = new XMLHttpRequest();
            $('#save').on('click', function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $.ajax({
                    type: 'POST',
                    url: '/HikakuPhone/save',
                    dataType: 'json', // 読み込むデータの種類を記入
                    data:{
                        carrier:"au",
                        Plans_name: @json($plansName),
                        Plans_price: @json($plansPrice),
                        Tells_name: @json($Tells_name),
                        Tells_price: @json($Tells_price),
                        Nets_price: @json($Nets_price),
                        Cards_price: @json($Cards_price),
                        Member_price: @json($Member_price),
                        Students_price: @json($Students_price),
                        Totals: @json($Totals),
                        name: @json($name),
                        user_id: @json($user_id),
                    },
                }).done(function (results) {
                    alert('保存しました。');
                }).fail(function (jpXHR) {
                    if(jpXHR.status==404){
                     alert('通信時にエラーが発生しました');
                    }
                    if(jpXHR.status==500){
                        alert('ログインできていません。保存するためにはログインが必要です。');
                    }
                })
            });
        });
    </script>
</head>

<div class="out">
    <div class="inner">
        <header id="header">
            <h1><a href="/HikakuPhone">比較Phone</a></h1>
            <h2>比較結果</h2>
            @if(isset($auths))
            <a href="/HikakuPhone/Mypage/low">{{$auths->name}}</a>
            @endif
            @if(!isset($auths))
                <div class="btn1">
                    <div id="drawer_toggle" class>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav id="global_nav" class>
                        <form action="/HikakuPhone/register" method="get">
                            <button type="submit" class="register">新規登録</button>
                        </form>   
                        <form action="/HikakuPhone/login" method="get">
                            <button type="submit" class="login">ログイン</button>
                        </form>    
                    </nav>
                </div>
            @endif
        </header>

        <body>
            <div class="carrier">
                <form action="/HikakuPhone/Docomo" method="post">
                    @csrf
                    <input type="hidden" name="net" value="{{$getNet}}">
                    <input type="hidden" name="card" value="{{$getCard}}">
                    <input type="hidden" name="member" value="{{$getMem}}">
                    @for($i=1; $getMem >= $i; $i++)
                        <input type="hidden" name="GB{{$i}}" value="{{$getGBs[$a]}}">
                        <input type="hidden" name="tell{{$i}}" value="{{$gettells[$a]}}">
                        <input type="hidden" name="age{{$i}}" value="{{$getages[$a]}}">
                        <input type="hidden" name="now{{$i}}" value="{{$getnows[$a]}}">
                        <input type="hidden" {{$a++}}>
                    @endfor
                    <input type="hidden" {{$a=0}}>
                    <button type="submit=" id="D">ドコモ</button>
                </form>

                <form action="/HikakuPhone/au" method=post>
                    @csrf
                    <input type="hidden" name="net" value="{{$getNet}}">
                    <input type="hidden" name="card" value="{{$getCard}}">
                    <input type="hidden" name="member" value="{{$getMem}}">
                    @for($i=1; $getMem >= $i; $i++)
                        <input type="hidden" name="GB{{$i}}" value="{{$getGBs[$a]}}">
                        <input type="hidden" name="tell{{$i}}" value="{{$gettells[$a]}}">
                        <input type="hidden" name="age{{$i}}" value="{{$getages[$a]}}">
                        <input type="hidden" name="now{{$i}}" value="{{$getnows[$a]}}">
                        <input type="hidden" {{$a++}}>
                    @endfor
                    <input type="hidden" {{$a=0}}>
                    <button type="submit=" id="second">au</button>
                </form>

                <form action="/HikakuPhone/SoftBank" method=post>
                    @csrf
                    <input type="hidden" name="net" value="{{$getNet}}">
                    <input type="hidden" name="card" value="{{$getCard}}">
                    <input type="hidden" name="member" value="{{$getMem}}">
                    @for($i=1; $getMem >= $i; $i++)
                        <input type="hidden" name="GB{{$i}}" value="{{$getGBs[$a]}}">
                        <input type="hidden" name="tell{{$i}}" value="{{$gettells[$a]}}">
                        <input type="hidden" name="age{{$i}}" value="{{$getages[$a]}}">
                        <input type="hidden" name="now{{$i}}" value="{{$getnows[$a]}}">
                        <input type="hidden" {{$a++}}>
                    @endfor
                    <input type="hidden" {{$a=0}}>
                    <button type="submit=" id="third">ソフトバンク</button>
                </form>

                <form action="/HikakuPhone/UQ" method=post>
                    @csrf
                    <input type="hidden" name="net" value="{{$getNet}}">
                    <input type="hidden" name="card" value="{{$getCard}}">
                    <input type="hidden" name="member" value="{{$getMem}}">
                    @for($i=1; $getMem >= $i; $i++)
                        <input type="hidden" name="GB{{$i}}" value="{{$getGBs[$a]}}">
                        <input type="hidden" name="tell{{$i}}" value="{{$gettells[$a]}}">
                        <input type="hidden" name="age{{$i}}" value="{{$getages[$a]}}">
                        <input type="hidden" name="now{{$i}}" value="{{$getnows[$a]}}">
                        <input type="hidden" {{$a++}}>
                    @endfor
                    <input type="hidden" {{$a=0}}>
                    <button type="submit=" id=fourth>UQ</button>
                </form>

                <form action="/HikakuPhone/Y!mobile" method=post>
                    @csrf
                    <input type="hidden" name="net" value="{{$getNet}}">
                    <input type="hidden" name="card" value="{{$getCard}}">
                    <input type="hidden" name="member" value="{{$getMem}}">
                    @for($i=1; $getMem >= $i; $i++)
                        <input type="hidden" name="GB{{$i}}" value="{{$getGBs[$a]}}">
                        <input type="hidden" name="tell{{$i}}" value="{{$gettells[$a]}}">
                        <input type="hidden" name="age{{$i}}" value="{{$getages[$a]}}">
                        <input type="hidden" name="now{{$i}}" value="{{$getnows[$a]}}">
                        <input type="hidden" {{$a++}}>
                    @endfor
                    <input type="hidden" {{$a=0}}>
                    <button type="submit=" id="fifth">Y!mobile</button>
                </form>
            </div>

            
                

            <div class="wrapper">
                <div class="attention1">
                    <span>最終更新日:2022/08/01</span>
                </div>
                
                <div class="box">
                    @for($i=1; $getMem >= $i; $i++)
                        <h1>{{$i}}台目</h1>
                        
                        <table border="1" class="table">
                        <tr>   
                                <th>{{$Plans_answer[$a]->name}}</th>
                                <td>{{$Plans_answer[$a]->price}}円</td>
                        </tr>
                            <tr>
                                <th>{{$Tells_name[$a]}}</th>
                                <td>+{{$Tells_price[$a]}}円</td>
                            </tr>
                            <tr>
                                <th>ネット割</th>
                                <td>-{{$Nets_price[$a]}}円</td>
                            </tr>
                            <tr>
                                <th>家族割</th>
                                <td>-{{$Member_price}}円</td>
                            </tr>
                            <tr>
                                <th>カード割</th>
                                <td>-{{$Cards_price[$a]}}円</td>
                            </tr>
                            <tr>
                                <th>学割</th>
                                <td>-{{$Students_price[$a]}}円</td>
                            </tr>
                        </table>

                        <h2>合計:{{$Totals[$a]}}円</h2>

                        @if($Totals[$a] >= $getnows[$a])
                            <h3>今より<span>{{$answers[$a]}}高い</span></h3>
                        @elseif($Totals[$a] < $getnows[$a])
                            <h3>今より<span id="high">{{$answers[$a]}}お得</span></h3>
                        @endif
                    
                        <input type="hidden"  {{$a++}}>
                @endfor
                
                <form class="save">
                    <button type="button" id="save">保存</button>
                </form>  

                </div>
                    <div class="attention">
                        <p><span>※</span>今回の比較結果は、目安です。</p>
                        <p><span>※</span>結果をもとに携帯販売員にご相談ください。</p>
                        <a href="https://www.au.com/mobile/simulation/" target="_blank">au公式シミュレーション</a>
                    </div>
            </div>
                
                
            
                <form action="/HikakuPhone/form_common" method="get">
                    <div class="btn">
                        <button type="submit">再比較</button>
                    </div>
                </form>
        </body>         
    </div>
</div>
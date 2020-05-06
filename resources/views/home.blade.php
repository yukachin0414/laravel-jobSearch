<!doctype html>
 <head>
  <meta charset="utf-8">
 </head>

 <body>
こんにちは！
@if (Auth::check())
    {{ \Auth::user()->name}}さん　　<a href="/auth/logout">ログアウト</a> </br>
    <a href="/jobs/index">求人一覧</a> 
    
@else
    ゲストさん<br />
    <a href="/auth/login">ログイン</a><br />
    <a href="/auth/register">会員登録</a>
@endif
</body>

</html>

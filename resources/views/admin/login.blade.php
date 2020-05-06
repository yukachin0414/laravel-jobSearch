<!doctype html>
<head>
  <meta charset="utf-8">
</head>

<body>
 <h1>管理者ログインフォーム</h1>
 @isset($message)
  <p style="color;red">{{$message}}</p>
 @endisset
 <form name="loginform" action="/admin/login" method="post">
  {{ csrf_field() }}
  メールアドレス:<input type="text" name="email" size="30" value="{{ old("emeil") }}"><br />
  パスワード:<input type="password" name="password" size="30"><br />
  <button type="submit" name="action" value="send">ログイン</button>
 </form>
</body>

</html>

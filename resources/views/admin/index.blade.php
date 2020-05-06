<!doctype html>
    <head>
        <meta charset="utf-8">
    </head>


<body>
    <h1>企業新規登録</h1>
    <form name="registform" action="/companies/new" method="post">
    {{ csrf_field() }}
        企業名:<input type="text" name="name" size="30"><span>{{ $errors->first('name') }}</span><br />
<!-- todo画像入力 -->
        画像:<input type="text" name="photo" size="30"><span>{{ $errors->first('photo') }}</span><br />
        <button type="submit" name="action" value="send">追加</button>
    </form>
</body>

</html>
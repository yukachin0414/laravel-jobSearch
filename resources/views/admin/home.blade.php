<!doctype html>
 <head>
  <meta charset="utf-8">
 </head>

 <body>
こんにちは！
@if (Auth::check('admin'))
    管理者：{{ \Admin::user()->name}}さん
    <a href="/admin/login">管理者ログイン</a><br />
    <a href="/admin/register">管理者登録</a>
    <a href="/admin/logout">ログアウト</a><br />

@else
    管理者さん　    <a href="/admin/logout">ログアウト</a><br />
    <a href="http://homestead.test/admin/companies/index" target="_top">企業一覧</a>
    <a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
    <a href="http://homestead.test/admin/skills/index" target="_top">スキル一覧</a>
@endif
</body>

</html>

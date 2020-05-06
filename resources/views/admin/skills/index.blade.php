<a href="http://homestead.test/admin/home" target="_top">ホーム</a>
<a href="http://homestead.test/admin/companies/index" target="_top">企業一覧</a>
<a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
<!--<a href="http://homestead.test/admin/skills/index" target="_top">スキル一覧</a>--></br></br>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <style type="text/css">
    table, td, th {
        border-collapse: collapse;
        border:1px solid #999;
    }
    td, th {
        padding: 2px 5px;
    }
    </style>
</head>
<body>
<a href="http://homestead.test/admin/skills/new" target="_top">スキル新規登録</a>
<table>
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                言語名
            </th>
            <th>
                編集
            </th>
            <th>
                削除
            </th>
        </tr>

    </thead>
    <tbody>@foreach ($skills as $skill)
        <tr>
            <td>
                {{$skill->id}}
            </td>
            <td>
                {{$skill->name}}
            </td>
            <td>
                <a href="http://homestead.test/admin/skills/edit/{{$skill->id}}" target="_top">編集</a>
            </td>
            <td>
                <form action="{{ action('Admin\SkillsController@destroy', $skill->id) }}" id="form_{{ $skill->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="#" data-id="{{ $skill->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
                </form>
            </td>

         </tr>
    @endforeach</tbody>
</table>

<script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
        document.getElementById('form_' + e.dataset.id).submit();
    }
}
</script>
</body>
</html>

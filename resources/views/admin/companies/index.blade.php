<a href="http://homestead.test/admin/home" target="_top">ホーム</a>
<!--<a href="http://homestead.test/admin/companies/index" target="_top">企業一覧</a>-->
<a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
<a href="http://homestead.test/admin/skills/index" target="_top">スキル一覧</a></br></br>
<a href="http://homestead.test/admin/companies/new" target="_top">企業新規登録</a></br>

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
<table>
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                企業名
            </th>
        </tr>
    </thead>
    <tbody>@foreach ($companies as $company)
        <tr>
            <td>
                {{$company->id}}
            </td>
            <td>
                {{$company->name}}
            </td>
            <td>
                <a href="http://homestead.test/admin/companies/edit/{{$company->id}}" target="_top">編集</a>
            </td>
            <td>
                <form action="{{ action('Admin\CompaniesController@destroy', $company->id) }}" id="form_{{ $company->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="#" data-id="{{ $company->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
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

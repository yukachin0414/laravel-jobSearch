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
<a href="/jobs/index">求人一覧</a> 
<table>
    <thead>
    <tr>
      <th>
        求人名
      </th>
      <td>
        {{$job->job_name}}
      </td>
    </tr>
    <tr>
      <th>
        企業名
      </th>
      <td>
        {{$job->company_name}}
      </td>
    </tr>
    <tr>
      <th>
        必須スキル
      </th>
      <td>
        @foreach ($jobSkills as $jobSkill)
            {{ $jobSkill->name }}
        @endforeach
      </td>
    </tr>
    </tbody>
</table>

@if ($job_favored)
  お気に入り済み
<!--    <form action="{{ action('JobFavoriteController@destroy', $job_favored) }}" id="form_{{ $job_favored }}" method="post">
      @csrf
      @method('DELETE')
        <a href="#" data-id="{{ $job_favored }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
    </form>!-->
@else
    <form method="post" action="/jobFavorites/create">
    @csrf
      <input type="hidden" name="job_id" value="{{$job->id}}" />
      <input type="submit" value="お気に入り追加">
  </form>
@endif

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


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
<a href="/home">ホーム</a></br></br>
<form action="">
    <input type="text" name="job_name" value="{{$search_conditions['job_name']}}" />
    <select name="company_id">
        <option value="">(全て)</option>
        @foreach ($companies as $company)
        <option value="{{$company->id}}" @if ($search_conditions['company_id'] === strval($company->id)) selected="selected" @endif>
            {{$company->name}}
        </option>
        @endforeach
    </select>
    <input type="submit">
</form>

<table>
    <thead>
        <tr>
            <th>
                求人名
            </th>
            <th>
                企業名
            </th>
            <th>
                詳細
            </th>
        </tr>
    </thead>
    <tbody>@foreach ($jobs as $job)
        <tr>
            <td>
                {{$job->job_name}}
            </td>
            <td>
                {{$job->company_name}}
            </td>
            <td>
                <a href="http://homestead.test/jobs/show/{{$job->id}}" target="_top">詳細</a>
            </td>
         </tr>
    @endforeach</tbody>
</table>

</body>
</html>

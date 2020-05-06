<a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
<p>登録しました。</p>
<p>求人名：{{ $job->job_name }}</p>
<p>企業名：
  {{ $job->company_name }}
<p>必須スキル：
@foreach ($jobSkills as $jobSkill)
  {{ $jobSkill->name }}
@endforeach</p>

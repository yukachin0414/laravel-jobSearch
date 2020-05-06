<a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
<form method="post" action="/admin/jobs/update" enctype="multipart/form-data">
    @csrf
        <div class="form">
            <div class="form-id">
                <label for="id">ID</label>
                {{ $job->id }}
                <input type="hidden" name="id" value="{{ $job->id }}">
            </div>
            <div class="form-title">
                <label for="title">求人名</label> 
                <input class="" name="name" value="{{ $job->name }}">
            </div>
            <div class="form-title">
                <label for="title">企業名</label> 
                <select name="company_id">
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-skill">
                <label for="title">必須スキル</label> 
                @foreach ($skills as $skill)
                    <label>
                        <input type="checkbox" name="skill[]" value="{{$skill->id}}"
                            {{ (in_array($skill->id, $jobSkills) ? 'checked="checked"' : '') }}
                        >
                        {{$skill->name}}
                    </label>
                @endforeach
            </div>
            <div class="form-submit">
                <button type="submit">更新する</button>
            </div>
        </div>
</form>

<form action="{{ action('Admin\JobsController@destroy', $job->id) }}" id="form_{{ $job->id }}" method="post">
  {{ csrf_field() }}
  {{ method_field('delete') }}
  <a href="#" data-id="{{ $job->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
  </form>
<script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('form_' + e.dataset.id).submit();
    }
}
</script>
</form>

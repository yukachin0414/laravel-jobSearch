<a href="http://homestead.test/admin/jobs/index" target="_top">求人一覧</a>
<form method="post" action="/admin/jobs/create" enctype="multipart/form-data">
 @csrf
  <div class="form">
    <div class="form-title">
      <label for="title">求人名</label> 
        <input type="text" name="name" value="">    
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
            <input type="checkbox" name="skill_id[]" value="{{$skill->id}}">
              {{$skill->name}}
          </label>
        @endforeach
      </div>
      <div class="form-submit">
      <button type="submit">投稿する</button>
      </div>
    </div>
  </div>
</form>

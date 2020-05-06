<a href="http://homestead.test/admin/skills/index" target="_top">スキル一覧</a>
<form method="post" action="/admin/skills/update" enctype="multipart/form-data">
 @csrf
        <div class="form">
            <div class="form-id">
                <label for="id">ID</label>
                {{ $skill->id }}
                <input type="hidden" name="id" value="{{ $skill->id }}">
            </div>
            <div class="form-title">
                <label for="title">企業名</label> 
                <input class="" name="name" value="{{ $skill->name }}">
            </div>
            <div class="form-submit">
                <button type="submit">更新する</button>
            </div>
</form>

<form action="{{ action('Admin\SkillsController@destroy', $skill->id) }}" id="form_{{ $skill->id }}" method="post">
  {{ csrf_field() }}
  {{ method_field('delete') }}
  <a href="#" data-id="{{ $skill->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
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

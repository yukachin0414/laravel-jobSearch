<a href="http://homestead.test/admin/companies/index" target="_top">企業一覧</a>
<form method="post" action="/admin/companies/update" enctype="multipart/form-data">
 @csrf
        <div class="form">
            <div class="form-id">
                <label for="id">ID</label>
                {{ $company->id }}
                <input type="hidden" name="id" value="{{ $company->id }}">
            </div>
            <div class="form-title">
                <label for="title">企業名</label> 
                <input class="" name="name" value="{{ $company->name }}">
            </div>
            <div class="form-submit">
                <button type="submit">更新する</button>
            </div>
        </div>
</form>

<form action="{{ action('Admin\CompaniesController@destroy', $company->id) }}" id="form_{{ $company->id }}" method="post">
  {{ csrf_field() }}
  {{ method_field('delete') }}
  <a href="#" data-id="{{ $company->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
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
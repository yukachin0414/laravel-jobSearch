<a href="http://homestead.test/admin/skills/index" target="_top">スキル一覧</a>
<form method="post" action="/admin/skills/create" enctype="multipart/form-data">
 @csrf
       <div class="form">
           <div class="form-title">
             <label for="title">言語名</label> 
             <input class="" name="name" value="{{ old('title') }}">
           </div>
           <div class="form-submit">
             <button type="submit">投稿する</button>
           </div>
       </div>
</form>
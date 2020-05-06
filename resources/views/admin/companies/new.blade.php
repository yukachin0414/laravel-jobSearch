<a href="http://homestead.test/admin/companies/index" target="_top">企業一覧</a>
<form method="post" action="/admin/companies/create" enctype="multipart/form-data">
 @csrf
       <div class="form">
           <div class="form-title">
             <label for="title">企業名</label> 
             <input class="" name="name" value="{{ old('title') }}">
           </div>
           <div class="form-submit">
             <button type="submit">投稿する</button>
           </div>
       </div>
</form>
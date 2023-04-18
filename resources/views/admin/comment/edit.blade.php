@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Edit Blog Post Comment</h3>  
      <form action = "{{route('admin.comment.edit.store')}}" method = "post" enctype="multipart/form-data">    
        @csrf

        <input name = "id" value = "{{$comment->id}}" hidden>
      
        <div class="row mb-3">
          <label for="author_name" class="col-sm-2 col-form-label">Author Name</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="author_name" name = "author_name" value = "{{$comment->author_name}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="author_email" class="col-sm-2 col-form-label">Author Email</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="author_email" name = "author_email" value = "{{$comment->author_email}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="author_phone" class="col-sm-2 col-form-label">Author Phone</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="author_phone" name = "author_phone" value = "{{$comment->author_phone}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="author_website" class="col-sm-2 col-form-label">Author Website</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="author_website" name = "author_website" value = "{{$comment->author_website}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="content" class="col-sm-2 col-form-label">Content</label>
          <div class="col-sm-10">
              <textarea id="content" name = "content" class="form-control">{{$comment->content}}</textarea>
          </div>
        </div>

      <button class = "btn btn-primary btn-rounded waves-effect waves-light">Save</button>
    </form>
      </form>
    </div>                     
@endsection



@section('js')
<script src="{{asset('admin/assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

<!-- bs custom file input plugin -->
<script src="{{asset('admin/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/form-element.init.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/form-editor.init.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>

<script>
$(document).ready(function(){
  $("#imageUrl").change(function(event){
    var fileReader = new FileReader();
    fileReader.onload = function(event){
      $(imageDisplay).attr("src",event.target.result);
    }
    fileReader.readAsDataURL(event.target.files[0]);
  })
});

</script>
@endsection
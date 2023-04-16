@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Add Blog Post</h3>  
      <form action = "{{route('admin.blog.add.store')}}" method = "post" enctype="multipart/form-data">    
        @csrf
      
        <div class="row mb-3">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="title" name = "title">
              @error('title')  
              <div class = "alert alert-danger">{{$message}}</div>
              @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="tags" class="col-sm-2 col-form-label">Tags</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="tags" name = "tags">
          </div>
        </div>  

        <div class="row mb-3">
          <label for="category_id" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example" name = "category_id" id="category_id">
                  @foreach ($blogCategories as $blogCategory)
                  <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>
                  @endforeach
                  </select>
          </div>
      </div>

        <div class="row mb-3">
          <label for="imageUrl" class="col-sm-2 col-form-label">Add Image</label>
          <div class="col-sm-10">
              <input class="form-control" type="file" id="imageUrl" name = "image_url">
          </div>
        </div>
        <div class="row mb-3">      
          <label for="firstName" class="col-sm-2 col-form-label"></label>      
          <div class="col-sm-10">
              <img  id = "imageDisplay" style = "width:120px"/>
          </div>
        </div>
        <label for="imageUrl" class="col-sm-2 col-form-label">Description</label>
        <textarea id="elm1" name="description"></textarea>
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
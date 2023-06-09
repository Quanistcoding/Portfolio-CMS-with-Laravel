@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Add Portfolio</h3>  
      <form action = "{{route('admin.portfolio.add.store')}}" method = "post" enctype="multipart/form-data">    
        @csrf
      
        <div class="row mb-3">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="title" name = "title">
          </div>
        </div>

        <div class="row mb-3">
          <label for="sub_title" class="col-sm-2 col-form-label">Subtitle</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="sub_title" name = "sub_title">
          </div>
        </div>  

        <div class="row mb-3">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example" name = "category" id="category">
                  @foreach ($portfolioCategories as $portfolioCategory)
                  <option value="{{$portfolioCategory->id}}">{{$portfolioCategory->name}}</option>
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
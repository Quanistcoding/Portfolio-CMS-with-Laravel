@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Edit About</h3>  
      <form action = "{{route('admin.about.store')}}" method = "post" enctype="multipart/form-data">    
          @csrf
        
          <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value = "{{$about->title}}" id="title" name = "title">
            </div>
            @error('title')
               <label class="col-sm-2"></label>
               <div class="col-sm-10 mt-1 px-2">
                  <div class="alert alert-danger">{{$message}}</div>                          
              </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label for="sub_title" class="col-sm-2 col-form-label">Subtitle</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value="{{$about->sub_title}}" id="sub_title" name = "sub_title">
            </div>
            @error('sub_title')
            <label class="col-sm-2"></label>
            <div class="col-sm-10 mt-1 px-2">
               <div class="alert alert-danger">{{$message}}</div>                          
           </div>
           @enderror
          </div>

          <div class="row mb-3">
            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value="{{$about->short_description}}" id="short_description" name = "short_description">
            </div>
          </div>

          <div class="row mb-3">
            <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value="{{$about->video_url}}" id="video_url" name = "video_url">
            </div>
          </div>

          <div class="row mb-3">
            <label for="imageUrl" class="col-sm-2 col-form-label">Edit Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="imageUrl" name = "image_url">
            </div>
          </div>
          <div class="row mb-3">      
            <label for="firstName" class="col-sm-2 col-form-label"></label>      
            <div class="col-sm-10">
                <img src = "{{asset($about->image_url)}}" id = "imageDisplay" style = "width:120px"/>
            </div>
          </div>
            <label for="imageUrl" class="col-sm-2 col-form-label">Edit Long Description</label>
            <textarea id="elm1" name="long_description">{{$about->long_description}}</textarea>
           
         
        <button class = "btn btn-primary btn-rounded waves-effect waves-light">Save</button>
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
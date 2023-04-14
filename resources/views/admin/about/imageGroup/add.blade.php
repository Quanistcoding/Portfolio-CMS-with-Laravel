@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Edit About</h3>  
      <form action = "{{route('admin.about.imageGroup.add.store')}}" method = "post" enctype="multipart/form-data">    
          @csrf

          <div class="row mb-3">
            <label for="imageUrl" class="col-sm-2 col-form-label">Edit Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="imageUrl" name = "image_url[]" multiple>
            </div>
          </div>
          <div class="row mb-3">      
            <label for="firstName" class="col-sm-2 col-form-label"></label>      
            <div class="col-sm-10" id = "imageDisplay">
            </div>
          </div>
                     
         
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
      var files = event.target.files;
      
      files.forEach(element => {
         var fileReader = new FileReader();
          fileReader.onload = function(event){

            $(imageDisplay).append(`
              <div class = "m-2 d-inline-block">
                <img src = "${event.target.result}" style = "width:120px">
              </div>
            `); 
          }
         fileReader.readAsDataURL(element);
      });
   
  })
});

</script>
@endsection
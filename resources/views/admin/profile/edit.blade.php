@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Edit Profile</h3>  
      <form action = "{{route('admin.profile.edit.store')}}" method = "post" enctype="multipart/form-data">    
          @csrf
        
          <div class="row mb-3">
            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value = "{{$profile->first_name}}" id="firstName" name = "first_name">
            </div>
            @error('first_name')
               <label class="col-sm-2"></label>
               <div class="col-sm-10 mt-1 px-2">
                  <div class="alert alert-danger">{{$message}}</div>                          
              </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value="{{$profile->last_name}}" id="lastName" name = "last_name">
            </div>
            @error('last_name')
            <label class="col-sm-2"></label>
            <div class="col-sm-10 mt-1 px-2">
               <div class="alert alert-danger">{{$message}}</div>                          
           </div>
         @enderror
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
                <img src = "{{asset($profile->image_url)}}" id = "imageDisplay" style = "width:120px"/>
            </div>
          </div>
        <button class = "btn btn-primary btn-rounded waves-effect waves-light">Save</button>
      </form>
    </div>                     
@endsection










@section('js')
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

<!-- bs custom file input plugin -->
<script src="{{asset('admin/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/form-element.init.js')}}"></script>

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
@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Edit Profile</h3>  

        @if(count($errors))
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        @endif
        
      <form action = "{{route('admin.changePassword.store')}}" method = "post">    
          @csrf   

          <div class="row mb-3">
            <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password"  id="oldPassword" name = "old_password">
            </div>
          </div>
          <div class="row mb-3">
            <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" id="newPassword" name = "new_password">
            </div>
          </div>
          <div class="row mb-3">
            <label for="confirmPassord" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" id="confirmPassord" name = "confirm_password">
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
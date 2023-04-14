@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Add Portfolio Category</h3>  
      <form action = "{{route('admin.portfolio.category.add.store')}}" method = "post">    
        @csrf
      
        <div class="row mb-3">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" id="category" name = "name">
              @error('name')
              <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
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
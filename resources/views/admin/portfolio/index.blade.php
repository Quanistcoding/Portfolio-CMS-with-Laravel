@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Portfolios</h3>  
      <div class="table-responsive">
        <table class="table mb-0">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($portfolios as $portfolio)
                <tr style = "vertical-align: middle">
                  <th>{{$i++}}</th>
                  <td>
                    {{$portfolio->title}}
                  </td>
                  <td>
                    {{$portfolio->sub_title}}
                  </td>
                  <td>
                    {{$portfolio->categoryName->name}}
                  </td>
                  <td>
                    <img src = "{{asset($portfolio->image_url)}}" style = "width:120px" />
                  </td>
                  <td>
                    <a class = "btn btn-info" href = "{{route('admin.portfolio.edit',$portfolio->id)}}">Edit</a>
                    <a class = "btn btn-danger" id = "delete" href = "{{route('admin.portfolio.delete',$portfolio->id)}}">Delete</a>
                  </td>
              </tr>
                @endforeach

               
            </tbody>
        </table>
    </div>
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


<script src="{{ asset('admin/assets/libs/sweetalert2at10.js') }}"></script>

 <script src="{{ asset('admin/assets/js/code.js') }}"></script>
@endsection
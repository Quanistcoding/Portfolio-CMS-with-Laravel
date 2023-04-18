@extends('admin._layout')
@section('content')
    <div class="container-fluid">
      <h3>Blog Post Comments</h3>  
      <div class="table-responsive">
        <table class="table mb-0">

            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Author Name</th>
                    <th>Author Email</th>
                    <th>Author Phone</th>
                    <th>Author Website</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr style = "vertical-align: middle">
                  <td>
                    <a href = "{{route('client.blog.detail',$comment->post->id)}}">{{$comment->post->title}}</a>
                  </td>
                  <td>
                    {{$comment->author_name}}
                  </td>
                  <td>
                    {{$comment->author_email}}
                  </td>
                  <td>
                    {{$comment->author_phone}}
                  </td>
                  <td>
                    {{$comment->author_website}}
                  </td>
                  <td>
                    {{$comment->content}}
                  </td>
                  <td>
                    {{$comment->approved ? 'true' : 'false'}}
                  </td>

                  <td>
                    <a class = "btn btn-primary" href = "{{route('admin.comment.approve',[$comment->id,$comment->approved])}}">Approve</a>
                    <a class = "btn btn-info" href = "{{route('admin.comment.edit',$comment->id)}}">Edit</a>
                    <a class = "btn btn-danger" id = "delete" href = "{{route('admin.blog.delete',$comment->id)}}">Delete</a>
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
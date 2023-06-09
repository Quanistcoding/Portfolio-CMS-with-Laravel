@extends('admin._layout')
@section('content')

    <div class="container-fluid">
      <h3>Portfolio Categories</h3>  
      <div class="table-responsive">
        <table class="table mb-0">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Portfolio Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($portfolioCategories as $category)
                <tr style = "vertical-align: middle">
                  <th>{{$i++}}</th>
                  <td>
                    {{$category->name}}
                  </td>
                  <td>
                    {{$category->portfolio_count}}
                  </td>
                  <td>
                    <a class = "btn btn-info" href = "{{route('admin.portfolio.category.edit',$category->id)}}">Edit</a>
                    <a class = "btn btn-danger delete" id = "delete" href = "{{route('admin.portfolio.category.delete',$category->id)}}">Delete</a>
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

</script>



@endsection
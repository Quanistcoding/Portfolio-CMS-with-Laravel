@extends('admin._layout')
@section('content')
    <div class="container-fluid">
        <div class="card-group">
            <div class="card mb-4 text-center">
                <div>
                 <img class="rounded-circle avatar-xl" src="{{asset($profile->image_url)}}" alt="Card image cap">
                </div>
                <div class="card-body">                    
                    <p class="card-text"><b>Last Name: </b>{{$profile->last_name}}</p>
                    <p class="card-text"><b>First Name: </b>{{$profile->first_name}}</p>
                </div>
            </div>
            <div class="card mb-4">
                
            </div>
            <div class="card mb-4">
               
            </div>
        </div>
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

@endsection
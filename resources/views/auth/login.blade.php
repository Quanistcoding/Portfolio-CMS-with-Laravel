<x-auth-session-status class="mb-4" :status="session('status')" />
 <!-- App favicon -->
 <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

 <!-- Bootstrap Css -->
 <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
 <!-- Icons Css -->
 <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- App Css-->
 <link href="{{asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

 <body class="auth-body-bg">
    <div class="bg-overlay"></div>
     <div class="wrapper-page">   
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                          <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{asset('admin/assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto" alt="">
                                        <img src="{{asset('admin/assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto" alt="">
                                    </a>
                                </div>
                           </div>

                            <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                            <div class="p-3">   
                                <form  class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                    @csrf
                    
                                    <!-- Email Address -->
                                    <div class="form-group mb-3">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>


                                    <!-- Remember Me -->
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                            <label class="form-label ms-1" for="remember_me">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 text-center mt-3 pt-1">
                                        <x-primary-button class="btn btn-info w-100 waves-effect waves-light">
                                            {{ __('Log in') }}
                                        </x-primary-button>                          
                                    </div>

                                    <div class="form-group mb-0 mt-2">
                                        @if (Route::has('password.request'))
                                            <div class="col-sm-7 mt-3"><i class="mdi mdi-lock"></i>
                                                <a class="text-muted" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            </div>
                                            
                                        @endif
                                        
                                    </div>

                                </form> 
                         </div>
                        
                  </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
            </div>
    </div>
<script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

<script src="{{asset('admin/assets/js/app.js')}}"></script>
</body>
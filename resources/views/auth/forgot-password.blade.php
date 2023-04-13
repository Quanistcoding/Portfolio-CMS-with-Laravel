 <!-- App favicon -->
 <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

 <!-- Bootstrap Css -->
 <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
 <!-- Icons Css -->
 <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- App Css-->
 <link href="{{asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
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
    
                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

                        
                        <div class="p-3">

                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

    <form method="POST" action="{{ route('password.email') }}" class="form-horizontal mt-3">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-info w-100 waves-effect waves-light">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <!-- end cardbody -->
    </div>
    <!-- end card -->
    </div>
    <!-- end container -->
    </div>
    <script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/aassets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/app.js')}}"></script>
</body>
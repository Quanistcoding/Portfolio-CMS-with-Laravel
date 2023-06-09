@php
    $profile = App\Models\Profile::find(1);
@endphp



<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

        <!-- jquery.vectormap css -->
        <link href="{{asset('admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('admin/assets/images/favicon.ico')}}" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/toastr.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap-tagsinput.css')}}" >
        <style type="text/css">
            .bootstrap-tagsinput .tag{
                margin-right: 2px;
                color: #b70000;
                font-weight: 700px;
            } 
        </style>
        
        <script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/sweetalert2at10.js') }}"></script>
        <script src="{{ asset('admin/assets/js/code.js') }}"></script>
        

    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/dashboard" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="/dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                        
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset($profile ? $profile->image_url : '')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{$profile ? $profile->last_name : ''}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="{{route('admin.changePassword')}}"><i class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <a role = "button" class="dropdown-item text-danger" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i>{{ __('Logout') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{asset($profile ? $profile->image_url : '')}}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{$profile ? $profile->last_name : ''}}</h4>
                            
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled">                            
                            <li>
                                <a class="waves-effect" href="/">
                                    <i class="ri-home-3-line"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Profile</span>
                                </a>
                                <ul class="sub-menu" aria-expanded = "false">
                                    <li><a href="{{route('admin.profile')}}">View Profile</a></li>
                                    <li><a href="{{route('admin.profile.edit')}}">Edit Profile</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-user-fill"></i>
                                    <span>About</span>
                                </a>
                                <ul class="sub-menu" aria-expanded = "false">
                                    <li><a href="{{route('admin.about')}}">Edit</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Image Group</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{route('admin.about.imageGroup')}}">List</a></li>
                                            <li><a href="{{route('admin.about.imageGroup.add')}}">Add</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-briefcase-5-fill"></i>
                                    <span>Portfolio</span>
                                </a>
                                <ul class="sub-menu" aria-expanded = "false">
                                    <li><a href="{{route('admin.portfolio')}}">List</a></li>
                                    <li><a href="{{route('admin.portfolio.add')}}">Add</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Category</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{route('admin.portfolio.category')}}">List</a></li>
                                            <li><a href="{{route('admin.portfolio.category.add')}}">Add</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-file-list-line"></i>
                                    <span>Blog</span>
                                </a>
                                <ul class="sub-menu" aria-expanded = "false">
                                    <li><a href="{{route('admin.blog')}}">List Posts</a></li>
                                    <li><a href="{{route('admin.blog.add')}}">Add Post</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Category</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{route('admin.blog.category')}}">List</a></li>
                                            <li><a href="{{route('admin.blog.category.add')}}">Add</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-message-2-line"></i>
                                    <span>Post Comments</span>
                                </a>
                                <ul class="sub-menu" aria-expanded = "false">
                                    <li><a href="{{route('admin.comment')}}">List</a></li>
                                    <li><a href="{{route('admin.blog')}}">Edit</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
               
               
                <div class="page-content">
                    @yield('content')
                    
                </div> 
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upcube.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        
        <!-- END layout-wrapper -->
        
          @yield("js")
          
          <script src="{{asset('admin/assets/js/app.js')}}"></script>
          <script type="text/javascript" src="{{asset('/admin/assets/libs/toastr.min.js')}}"></script>
          <script src="{{asset('admin/assets/libs/bootstrap-tagsinput.min.js')}}" ></script>
         @if(Session::has('message')) 
            <script>           
                var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            
                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            
                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            
                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break; 
                }            
           </script>
          @endif 
    </body>

</html>
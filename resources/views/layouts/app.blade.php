<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>@yield('title')</title>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style-light.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}" />
@stack('css')
 
</head>

<body>

 <div class="wrapper">

<!--=================================
 preloader -->
 
<div id="pre-loader">
    <img src="images/pre-loader/loader-01.svg" alt="">
</div>

<!--=================================
 preloader -->
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <!--================================= login-->

    @yield('content')
    
    <!--================================= login-->
      
    </div>
    
    
     
    <!--=================================
     jquery -->
    
        <!-- jquery -->
        <script src="{{ asset('assets/admin/js/jquery-3.3.1.min.js') }}"></script>
    
        <!-- plugins-jquery -->
        <script src="{{ asset('assets/admin/js/plugins-jquery.js') }}"></script>
    
        <!-- plugin_path -->
        <script>
            var plugin_path = '{{ asset('assets/admin/js') }}/';
        </script>
    
        <!-- chart -->
        <script src="{{ asset('assets/admin/js/chart-init.js') }}"></script>
    
        <!-- calendar -->
        <script src="{{ asset('assets/admin/js/calendar.init.js') }}"></script>
    
        <!-- charts sparkline -->
        <script src="{{ asset('assets/admin/js/sparkline.init.js') }}"></script>
    
        <!-- charts morris -->
        <script src="{{ asset('assets/admin/js/morris.init.js') }}"></script>
    
        <!-- datepicker -->
        <script src="{{ asset('assets/admin/js/datepicker.js') }}"></script>
    
        <!-- sweetalert2 -->
        <script src="{{ asset('assets/admin/js/sweetalert2.js') }}"></script>
    
        <!-- toastr -->
        <script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
    
        <!-- validation -->
        <script src="{{ asset('assets/admin/js/validation.js') }}"></script>
    
        <!-- lobilist -->
        <script src="{{ asset('assets/admin/js/lobilist.js') }}"></script>
    
        <!-- custom -->
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
        @stack('js')
     
    </body>
    </html>

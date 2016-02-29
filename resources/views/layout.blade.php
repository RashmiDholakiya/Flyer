<!DOCTYPE html>
<html>
<head>
    <title>Flyer</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/dropzone/4.3.0/dropzone.min.js"></script>
    <script src="{!! asset('js/sweetalert-dev.js') !!}"></script>
    <script src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <script src="{!! asset('js/lity.js') !!}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/dropzone/4.3.0/dropzone.min.css">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/sweetalert.css') !!}" rel="stylesheet" type="text/css">
   {{-- <link href="{!! asset('css/app.css') !!}" rel="stylesheet" type="text/css">--}}
    <link href="{!! asset('css/lity.css') !!}" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
        .swipe {
            overflow: hidden;
            visibility: hidden;
            position: relative;
        }
        .swipe-wrap {
            overflow: hidden;
            position: relative;
        }
        .swipe-wrap > div {
            float:left;
            width:100%;
            position: relative;
        }
    </style>
    <script>
        Dropzone.options.addphoto = {
            paramName: 'photo',
            acceptedFiles: '.jpg , .jpeg, .png',
        }
        window.mySwipe = new Swipe(document.getElementById('slider'), {
            startSlide: 2,
            speed: 400,
            auto: 3000,
            continuous: true,
            disableScroll: false,
            stopPropagation: false,
            callback: function(index, elem) {},
            transitionEnd: function(index, elem) {}
        });
    </script>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: #ebebeb; font-size: x-large" href="#">Project Flyer</a>
            </div>
            <ul class="nav navbar-nav">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @yield('nav')
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="">

                            </li>
                        @endif
                    </ul>
                </div>
            </ul>
            @if(\Illuminate\Support\Facades\Auth::user())
                <a href="{{ url('/logout') }}" style="float: right; " class="navbar-brand" >
                    Logout
                </a>
            <a class="navbar-brand" href="#" style="float: right; color: #ebebeb;"> Welcome, {!! \Illuminate\Support\Facades\Auth::user()->name !!}</a>
            @endif
        </div>
    </nav>
</head>
@if(isset($_SESSION['msg']))

    <script type="text/javascript">
        swal({
            title: "Success!",
            text: "Your data saved successfully..",
            type: "success",
            confirmButtonText: "Okay"
        });
    </script>
@endif
<body>
<div class="">
    @yield('contents')
</div>
</body>
</html>

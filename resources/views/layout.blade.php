<!DOCTYPE html>
<html>
<head>
    <title>Flyer</title>


    <script src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/dropzone/4.3.0/dropzone.min.js"></script>

    <script src="{!! asset('js/sweetalert-dev.js') !!}"></script>

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
            float: left;
            width: 100%;
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
            callback: function (index, elem) {
            },
            transitionEnd: function (index, elem) {
            }
        });
    </script>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: #ebebeb; font-size: x-large" href="#">Project Flyer</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- Left Side Of Navbar -->
                    @yield('nav')
                </ul>
                <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #fff9fb">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
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

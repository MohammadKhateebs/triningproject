<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar'? 'rtl' : 'ltr' }}">
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('message.kidsAcademy')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>


</head>
<style>
    * {
        box-sizing:border-box;
    }

    body {
        font-family: Arial;
        background: #f1f1f1;
    }

    .sidenav {
        height: 100%;
        width: 250px;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        background-color:  hsl(120,100%,75%);
        background-image: linear-gradient(right, hsl(120,100%,75%) , #ccffcc);
        overflow-x: hidden;
        transition: 0.5s;
        margin-top: 110px;


    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        background: -webkit-linear-gradient(black, #333);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: block;
        transition: 0.3s;

    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    #ad {
        padding: 12px;
    }

    .navbar, .modal-header {
        background-color:  hsl(120,100%,75%);
        background-image: radial-gradient(circle, hsl(120,100%,75%) , #ccffcc);

    }

    .login {

        height: 1000px;

    }

    .register {
        height: 1000px;
    }

    .welc {
        overflow: hidden;
        display: block;
        position: relative;

    }

    div {
        display: block;
    }

</style>

<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark  shadow-sm ">
        <a class="navbar-brand" style="margin-left:35px;margin-right: 35px;" href="{{ url('/') }}">
            <img src="/img/logo.png" alt="logo" style="width: 200px;height: 100px;">
        </a>
        <div class="container">



            <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span  class="navbar-toggler-icon "></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <ul class="navbar-nav mr-auto">
                    @guest

                    @else
                        @if(Auth::user()->role==1)
                            @yield('adminNav')

                        @endif
                    @endguest

                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-md-n5">
                    <!-- Authentication Links -->
                @guest
                    <!-- Login -->
                        <li class="nav-item">

                            <div class="row row-cols-md">
                                <div class="col ri-insert-column-left">
                                    <div id="loginForm" style="display: none">
                                        <form method="POST" action="{{ route('login') }} ">
                                            @csrf


                                            <input id="userid" type="text"
                                                   class="form-control text-white bg-dark m @error('userid') is-invalid @enderror"
                                                   placeholder="{{ __('message.user Id') }}"
                                                   name="userid" value="{{ old('userid') }}" required
                                                   autofocus>
                                            <input id="password" type="password"
                                                   placeholder="{{ __('message.Password') }}"
                                                   class="form-control text-white bg-dark"
                                                   name="password" required
                                                   autocomplete="current-password">


                                            <button type="submit"
                                                    class="btn text-white bg-dark btn-outline-dark waves-effect"> {{ __('message.Login') }}</button>



                                        </form>
                                    </div>
                                    <a href="/login" style="height: 40px; margin: 10px ;width:200px;" type="button" type="button" class="btn btn-outline-dark">
                                        {{ __('message.Login') }}
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- Register -->
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <div class="row row-cols-md">
                                    <div class="col ri-insert-column-left">
                                        <a href="/register" style="height: 40px; margin: 10px;width:200px;" type="button" type="button" class="btn btn-outline-dark">
                                            {{ __('message.Register') }}
                                        </a>
                                    </div>
                                </div>
                            </li>


                        @endif

                        @yield('RequestStudentAndVolunteer')
                    @else


                        <li id="ad" class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i
                                        class="fa fa-fw fa-user"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePassword"><i class="fa fa-fw fa-edit"></i> {{ __('message.change password') }}

                                </button>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                            <!--change Password Modal-->


                        </li>


                @endguest
                <!--Language button-->
                    <li id="ad" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">| {{__('message.Language')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                    @if( $properties['native'] == 'English')
                                        <i class="flag-icon flag-icon-us"></i>
                                    @else
                                        <i class="flag-icon flag-icon-sa"></i>
                                    @endif
                                </a>

                            @endforeach

                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    @yield('content')
    @guest
    @else
        <div class="modal  " id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " >
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.change password')}}!</h2>

                    </div>
                    <div class="card-body  ">

                        <form id="changeForm" >

                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{Auth::user()->userid}}">
                            <span style="width: 100%;display: block;" class="text-white bg-success text-center doneChange"></span>
                            <br>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text"  name="userid" id="useridch" placeholder="{{__('message.user Id')}}" class="form-control "    >
                                    <span class="text-danger error-text userid_errChange"></span>
                                    <span class="text-danger error-text errorID_errChange"></span>


                                </div>
                            </div>

                            <div class="form-group row  justify-content-center" >
                                <div class="col-md-6">
                                    <input type="password" name="password" id="passwordch" placeholder="{{__('message.Password')}}" class="form-control "  >
                                    <span class="text-danger error-text password_errChange"></span>


                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control password_confirmation" name="password_confirmation"
                                           placeholder="{{ __('message.Confirm Password') }}"
                                           required autocomplete="new-password">

                                </div>


                            </div>


                            <div class="modal-footer justify-content-center">
                                <button type="button"
                                        class="btn  btn-outline-dark waves-effect"
                                        data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                <button type="submit" id="change"
                                        class="btn  btn-outline-dark waves-effect"> {{ __('message.change') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        <script>
            $(document).on('click','#change',function (e){
                e.preventDefault();
                var route = " ";
                if ({{ Auth::user()->role }}==1)
                route = "{{route('changePassword')}}"
            else
                if ({{ Auth::user()->role }}==2
            )
                route = "{{route('changePasswordT')}}"
            else
                if ({{ Auth::user()->role }}==3
            )
                route = "{{route('changePasswordV')}}"
            else
                if ({{ Auth::user()->role }}==4
            )
                route = "{{route('changePasswordS')}}"
                $('.userid_errChange').text(" ");

                $('.password_errChange').text(" ");

                $('.errorID_errChange').text(" ");
                $('.doneChange').text(" ");

                $.ajax({
                    type:'post',
                    url:route,
                    dataType: "json",
                    data: $('#changeForm').serialize(),
                    success: function(data) {
                        if(!$.isEmptyObject(data.error)){
                            printErrorMsg(data.error);
                        }

                        if(!$.isEmptyObject(data.errorID)){
                            $('.errorID_errChange').text(data.errorID);
                        }
                        if (!$.isEmptyObject(data.done)){
                            $('#useridch').val("");

                            $('#passwordch').val("");

                            $('.password_confirmation').val("");

                            $('.doneChange').text(data.done);

                        }

                    }

                });
                function printErrorMsg (msg) {

                    $.each( msg, function( key, value ) {
                        console.log(key);
                        $('.'+key+'_errChange').text(value);
                    });
                }
            });



        </script>

    @endguest

</div>

</body>


@include('layouts.footer');

</html>

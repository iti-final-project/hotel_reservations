<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
        <style>
            body{
                padding-top: 65px;
                padding-bottom: 30px;
            }
            .login_image{
                height: 50px;
            }
            #password + .input-group-append {
                cursor: pointer;
                pointer-events: all;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="{{ route('homepage') }}">Hotels Reservations</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @if(url()->current() === route('homepage'))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item">
                                    @endif
                                    <a class="nav-link" href="{{ route('homepage') }}">Home<span
                                            class="sr-only">(current)</span></a>
                                </li>

                                @if(url()->current() === route('hotels'))
                                    <li class="nav-item active">
                                @else
                                    <li class="nav-item">
                                        @endif
                                        <a class="nav-link" href="{{ route('hotels') }}">Hotels</a>
                                    </li>


                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="logout">logout</a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                </form>
                            @else
                                @if(url()->current() === route('login'))
                                    <li class="nav-item active">
                                @else
                                    <li class="nav-item">
                                @endif
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if(url()->current() === route('register'))
                                    <li class="nav-item active">
                                @else
                                    <li class="nav-item">
                                @endif
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        </ul>

                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search by name"
                                   aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </header>
            <div class="row">
                @yield('content')
            </div>
            <footer class="footer fixed-bottom bg-dark">
                <div class="row">
                    <div class="col-12 text-center text-light">
                        <span>&copy;2019 - All rights reserved</span>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $("#logout").on("click",function () {
                    event.preventDefault();
                    $("#logout-form").submit();
                })
                $("#password + .input-group-append").on("click",function () {
                    let password = $("#password");
                    let eye = $('.svg-inline--fa');
                    if (password.attr('type') === "password") {
                        password.attr('type', 'text');
                        eye.toggleClass('fa-eye-slash').toggleClass('fa-eye');
                    } else {
                        password.attr('type', 'password');
                        eye.toggleClass('fa-eye-slash').toggleClass('fa-eye');
                    }
                })
            })

        </script>
    </body>
</html>

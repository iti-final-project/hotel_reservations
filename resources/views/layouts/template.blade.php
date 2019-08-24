<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body{
                padding-top: 65px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="{{ route('homepage') }}">Hotels Reservations</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @if(url()->current() === route('homepage'))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item:">
                            @endif
                                <a class="nav-link" href="{{ route('homepage') }}">Home<span class="sr-only">(current)</span></a>
                            </li>

                            @if(url() === route('hotels'))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item:">
                            @endif
                                <a class="nav-link" href="{{ route('hotels') }}">Hotels</a>
                            </li>

                            @if(url() === route('login'))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item:">
                            @endif
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>

                            @if(url() === route('registration'))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item:">
                            @endif
                                    <a class="nav-link" href="{{ route('registration') }}">Register</a>
                            </li>
                        </ul>

                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </header>
            <div class="row">
                @yield('body')
            </div>
            <footer class="footer fixed-bottom bg-dark">
                <div class="row">
                    <div class="col-12 text-center text-light">
                        <span>&copy;2019 - All rights reserved</span>
                    </div>
                </div>
            </footer>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

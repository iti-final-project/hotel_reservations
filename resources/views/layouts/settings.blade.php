@extends('layouts.template')
@section('title',Auth::User()->username.' | Settings')
@section('content')
    <div class="col-lg-3 col-sm-12 ">
        <div class="img-thumbnail">
            <h5>Updates</h5>
            <hr>
            <ul class="nav nav-pills flex-lg-column flex-sm-row">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('settings') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hotel_room') }}">Hotel rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hotel_image') }}">Hotel images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('passwordChange') }}">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Delete Account</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        @yield('updateContent')
    </div>
@stop

@extends('layouts.template')
@section('title','Login Page')
@section('body')
    <div class="col-12 d-flex justify-content-center">
        <div class="row img-thumbnail">
            <div class="col-12 text-center">
                <img src="{{ asset('images/Login_Hotel.png') }}" class="login_image">
                <h2>Login</h2>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('performLogin') }}">
                    <div class="form-group">
                        @csrf
                        <label for="email">Username</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                               placeholder="Enter username or email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="keepLogin" id="keepLogin">
                        <label class="form-check-label" for="keepLogin">Keep me logged in</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@stop

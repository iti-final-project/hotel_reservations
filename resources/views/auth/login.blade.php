@extends('layouts.template')
@section('title','Login')
@section('content')
    <div class="col-12 d-flex justify-content-center">
        <div class="row img-thumbnail">
            <div class="col-12 text-center">
                <i class="fas fa-hotel fa-3x"></i>
                <h2>Login</h2>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('login') }}">@csrf
                    @error('form')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp"
                              value="{{ old('email') }}" placeholder="Enter email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  id="password"
                                   placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
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

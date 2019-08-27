@extends('layouts.template')
@section('title','Registration')
@section('content')
    <div class="col-12 d-flex justify-content-center">
        <div class="row img-thumbnail">
            <div class="col-12 text-center">
                <i class="fas fa-clipboard-list fa-3x"></i>
                <h2>Register</h2>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('register') }}">@csrf

                    <div class="form-group">
                        <label for="name">Hotel name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp"
                               value="{{ old('name') }}" placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control popover-dismiss @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="usernameHelp"
                               value="{{ old('username') }}" placeholder="Enter username" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="Username" required>
                        <div id="popover-content-username" style="display: none">
                            <ul>
                                <li>Must be at least 5 characters</li>
                                <li>Can include alphabet and numbers only.</li>
                                <li>Cannot start with number</li>
                                <li>Must be unique</li>
                            </ul>
                        </div>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="countrySelector">Location</label>
                        <div class="form-group">
                            <select class="custom-select @error('country') is-invalid @enderror" name="country" id="country" required>
                                <option value="" selected>Choose Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="Enter city" required>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" id="district" placeholder="Enter district" required>
                            @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp"
                               value="{{ old('email') }}" placeholder="Enter email" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="Email" required>
                        <div id="popover-content-email" style="display: none">
                            <ul>
                                <li>Must be a valid email.</li>
                                <li>Must be unique.</li>
                            </ul>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control popover-dismiss @error('password') is-invalid @enderror" name="password"  id="password"
                                   placeholder="Password" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="Password" oncopy="return false" oncut="return false" onpaste="return false" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div id="popover-content-password" style="display: none">
                            <ul>
                                <li>Must be unique.</li>
                                <li>Must be at least 8 characters.</li>
                                <li>Must have at least a number and uppercase letter and a symbol.</li>
                            </ul>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password-confirm"  id="password-confirm"
                                   placeholder="Confirm Password" oncopy="return false" oncut="return false" onpaste="return false" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="licence" id="licence">
                        <label class="form-check-label" for="licence">I agree on website licence agreement</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $(function () {
                $('[data-toggle="popover"]').popover()
            });
            $('#username').popover({
                trigger: 'focus',
                html: true,
                content: function() {
                    return $('#popover-content-username').html();
                }
            });
            $('#email').popover({
                trigger: 'focus',
                html: true,
                content: function() {
                    return $('#popover-content-email').html();
                }
            });
            $('#password').popover({
                trigger: 'focus',
                html: true,
                content: function() {
                    return $('#popover-content-password').html();
                }
            });

            $("#password-confirm + .input-group-append").on("click",function () {
                let eye = $('[data-icon^=eye]');
                let password = $("#password-confirm");
                if (password.attr('type') === "password") {
                    password.attr('type', 'text');
                    eye.eq(1).toggleClass('fa-eye-slash').toggleClass('fa-eye');
                } else {
                    password.attr('type', 'password');
                    eye.eq(1).toggleClass('fa-eye-slash').toggleClass('fa-eye');
                }
            })
        })
    </script>
@stop

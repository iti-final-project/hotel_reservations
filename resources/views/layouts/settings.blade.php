@extends('layouts.template')
@section('title',Auth::User()->username.' | Settings')
@section('content')
    <div class="col-lg-3 col-sm-12 ">
        <div class="img-thumbnail">
            <h5>Updates</h5>
            <hr>
            <ul class="nav nav-pills flex-lg-column flex-sm-row">
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() === 'settings'?'active':'' }}" href="{{ route('settings') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() === 'hotel_room'?'active':'' }}" href="{{ route('hotel_room') }}">Hotel rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() === 'hotel_image'?'active':'' }}" href="{{ route('hotel_image') }}">Hotel images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() === 'passwordChange'?'active':'' }}" href="{{ route('passwordChange') }}">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#" data-toggle="modal" data-target=".delete-user" aria-hidden="true">Delete Account</a>
                    <div class="modal fade delete-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 style="font-weight: bold">Deleting account</h5>
                                    <hr>
                                    <form method="post" action="{{ route('settings') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <p>Are you sure you want to <span class="text-danger">delete</span> your account?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        @if(session()->has('errors'))
            <div class="row">
                <div class="col-10 border-danger" style="border:1px dashed; background: lightcoral;">
                    <p style="color: darkred">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                </div>
            </div>
        @endif
        @yield('updateContent')
    </div>
@stop

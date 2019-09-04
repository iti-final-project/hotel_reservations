@extends('layouts.settings')
@section('updateContent')
    <h3>About</h3>
    @if(session()->has('updated'))
        <div class="row">
        @if(session('updated'))
            <div class="col-10 border-success" style="border:1px dashed; background: lightgreen;">
                <p style="color: darkgreen">
                    About successfully updated.
                </p>
            </div>
        @else
            <div class="col-10 border-danger" style="border:1px dashed; background: lightcoral;">
                <p style="color: darkred">
                    Failed to update About.
                </p>
            </div>
        @endif
        </div>
    @endisset
    <form method="post" action="{{ route('settings') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $hotel->name }}">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" value="{{ $hotel->username }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $hotel->email }}">
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" class="form-control" name="desc" id="desc" value="{{ $hotel->desc }}">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select class="custom-select @error('country') is-invalid @enderror" name="country" id="country" required>
                <option value="" selected>Choose Country</option>
                @foreach($countries as $country)
                    @if($country === $hotel->country)
                        <option value="{{ $country }}" selected>{{ $country }}</option>
                    @else
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ $hotel->city }}">
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" name="district" id="district" value="{{ $hotel->district }}">
        </div>

        <div class="form-group">
            <label for="telephone">Phone number</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $hotel->telephone }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop

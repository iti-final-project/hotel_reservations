@extends('layouts.template')
@section('title', $hotel->username.' | Profile')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $hotel->name }}</h2>
                    <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12 order-sm-last order-lg-first mt-sm-1 mt-lg-0 img-thumbnail">
                <div class="row">
                    <div class="col-12">
                        <h3>About</h3>
                        <small class="text-muted">Last updated {{ Carbon\Carbon::parse($hotel->updated_at)->diffForHumans() }}</small>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5>Welcome to {{ $hotel->name }} hotel profile</h5>
                        <table class="table table-hover table-borderless">
                            <tbody>
                            @if($hotel->desc)
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>{{ $hotel->desc }}</td>
                                </tr>
                            @endif
                            @if($hotel->district)
                                <tr>
                                    <th scope="row">District</th>
                                    <td>{{ $hotel->district }}</td>
                                </tr>
                            @endif
                            @if($hotel->city)
                                <tr>
                                    <th scope="row">City</th>
                                    <td>{{ $hotel->city }}</td>
                                </tr>
                            @endif
                            @if($hotel->country)
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>{{ $hotel->country }}</td>
                                </tr>
                            @endif
                            @if($hotel->telephone)
                                <tr>
                                    <th scope="row">Contact</th>
                                    <td>{{ $hotel->telephone }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php($images = $hotel->images)
            @php($imagesCount = count($images))

            @if($imagesCount)
            <div class="col-lg-8 col-sm-12 order-sm-first order-lg-last">
                <div class="carousel">
                    <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                            @for( $i=1 ; $i<$imagesCount ; $i++)
                                <li data-target="#carouselCaptions" data-slide-to="{{ $i }}"></li>
                            @endfor
                        </ol>
                        @php($main = false)
                        <div class="carousel-inner">
                            @foreach($images as $image)
                                @if($image->type === 'main' && !$main)
                                    @php($main = true)
                                <div class="carousel-item active">
                                    <img src="{{ Storage::url($image->link) }}" class="d-block w-100 rounded" style="width: 600px; height: 400px;" alt="Couldn't load image">
                                    <div class="carousel-caption d-none d-md-block">
                                        @if($image->desc)
                                        <p class="rounded" style="background: rgba(0,0,0,0.5);font-size: large;">{{ $image->desc }}</p>
                                        @endif
                                    </div>
                                </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ Storage::url($image->link) }}" class="d-block w-100 rounded" style="width: 600px; height: 400px;" alt="Couldn't load image">
                                        <div class="carousel-caption d-none d-md-block">
                                            @if($image->desc)
                                                <p class="rounded" style="background: rgba(0,0,0,0.5);font-size: large;">{{ $image->desc }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            @else
                <h3 class="text-black-50 mr-auto ml-auto mt-auto mb-auto">No images added yet.</h3>
            @endif
        </div>
        <div class="row img-thumbnail mr-3 ml-0 mt-1">
            <div class="col-12">
                <h3>Rooms Available</h3>
                <hr>
            </div>
            @php($rooms = $hotel->rooms)
            @if(count($rooms))
            <div class="col-12">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Room type</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Count</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{ $room->roomType->type}}</th>
                            <td>{{ $room->roomType->persons }}</td>
                            <td>{{ $room->number }}</td>
                            <td>{{ $room->price }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @else
                <h3 class="text-black-50 mr-auto ml-auto">No rooms added yet.</h3>
            @endif
        </div>
    </div>
@stop

@extends('layouts.template')
@section('title','Hotels')
@section('content')
    <div class="col-4">
        <p class="text-dark font-weight-bold" style="font-size: xx-large">Hotels</p>
    </div>
    <div class="col-6">
        <form method="get" action="{{ route('hotels') }}">
            <div class="form-group">
                <input type="text" class="form-control" name="q" id="advancedSearch" placeholder="Advanced Search" value="{{ isset($_GET['q'])?$_GET['q']:'' }}">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-success my-2 my-sm-0" name="searchBy" value="name" type="submit"><i class="fas fa-search"></i>By Name</button>
                <button class="btn btn-outline-success my-2 my-sm-0" name="searchBy" value="location" type="submit"><i class="fas fa-search"></i>By Location</button>
            </div>
        </form>
    </div>
    @if(count($hotels))
        @foreach($hotels as $hotel)
            @php($hotelImages = $hotel->images)
            <div class="col-11 mr-auto ml-auto">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-3 mr-auto ml-auto" style="padding-top:10px; padding-bottom: 10px;">
                            @if(count($hotelImages))
                                @foreach($hotelImages as $hotelImage)
                                    @if($hotelImage->type === 'main')
                                        <img src="{{ Storage::url($hotelImage->link) }}" style="width: 100%;height: 100%" class="card-img" alt="Failed to load Image">
                                        @break
                                    @endif
                                @endforeach
                            @else
                                <img src="{{ asset('images/Hotel_default.png') }}" style="width: 100%;height: 100%" class="card-img" alt="Failed to load Image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel->name }}</h5>
                                @if($hotel->desc)
                                    <p class="card-text">{{ $hotel->desc }}</p>
                                @endif
                                @php($fullAddress = implode(", ", array_filter([$hotel->district,$hotel->city,$hotel->country])))
                                @if($fullAddress)
                                <p class="card-text">Location: {{$fullAddress}}</p>
                                @endif
                                <p class="card-text"><small class="text-muted">Last updated {{ Carbon\Carbon::parse($hotel->updated_at)->diffForHumans() }}</small></p>
                                <a href="{{ route('profile',['username'=> $hotel->username]) }}" class="btn btn-primary">View hotel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if($pages >= 1)
        <nav class="mr-auto ml-auto">
            <ul class="pagination">
                @if($prev)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('hotels', ['start'=>$currentPage - 1]) }}{{ request()->getQueryString()?'?'.request()->getQueryString():'' }}">Previous</a>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                @endif
                </li>
                @for($i = 1 ; $i<=$pages ; $i++)
                    @if($currentPage === $i)
                            <li class="page-item active" aria-current="page">
                              <span class="page-link">
                                {{ $i }}
                                <span class="sr-only">(current)</span>
                              </span>
                            </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ route('hotels', ['start' => $i]) }}{{ request()->getQueryString()?'?'.request()->getQueryString():'' }}">{{ $i }}</a></li>
                    @endif
                @endfor
                <li class="page-item">
                @if($next)
                    <li class="page-item">
                        <a class="page-link" href="{{ route('hotels', ['start'=>$currentPage + 1]) }}{{ request()->getQueryString()?'?'.request()->getQueryString():'' }}">Next</a>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                @endif
                </li>
            </ul>
        </nav>
        @endif
    @else
        <div class="col-11 mr-auto ml-auto">
            <p class="text-muted font-weight-bold">
                No data found...
            </p>
        </div>
    @endif
@stop

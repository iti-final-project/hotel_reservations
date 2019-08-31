@extends('layouts.template')
@section('title', $hotel->username.' | Profile')
@section('content')
    {{ $hotel->rooms[0]->roomType }}
@stop

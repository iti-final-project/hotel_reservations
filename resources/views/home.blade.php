@extends('layouts.template')
@section('title','Hotel Reservations | Official Website')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=BioRhyme&display=swap" rel="stylesheet">
    <style>
        .backgound{
            background: url("{{ asset('images/homepage_background.jpg') }}") no-repeat center;
            background-size: cover;
            height: 500px;
            margin-top: -12px;
        }
        .darken-pseudo {
            position: relative;
        }

        .darken-pseudo:after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: block;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .darken-with-text div{
            font-weight: bold;
            margin: 0;
            font-size: 2em;
            text-align: center;
            color: white;
            padding-top: 50px;
            position: relative;
            z-index: 1;
        }
        span.homepage{
            display: block;
            font-weight: bold;
            font-size: xx-large;
        }
        span.welcome{
            font-family: 'BioRhyme';
            margin-top: -200px;
        }
        td{
            width: 50%;
        }
    </style>
@stop
@section('content')
    <div class="col-12">
        <div class="row backgound darken-pseudo darken-with-text">
            <div class="col-12 text-center mb-auto mt-auto text-white">
                <div>
                    <span class="homepage welcome">Welcome to</span>
                    <span class="homepage">Hotels Reservation</span>
                    <p style="font-size: x-large">
                        You can now search the hotel you want,<br>
                        Sometimes there are big discounts from time to other.<br>
                        The site provides filtering to data by making popular first then less popular.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center" >
                <h3 style="font-family: 'Arial Black'">WHY Hotels Reservations?</h3>
                <p style="font-size: large;">The best features to help you find the best hotel.</p>
                <hr>
            </div>
            <div class="col-12 text-center">
                <table class="table table-borderless" style="font-size: large">
                    <tbody>
                        <tr>
                            <td><i class="fas fa-info fa-3x"></i><br>You can know everything about most of hotels.</td>
                            <td><i class="fas fa-images fa-3x"></i><br>You can know see hotels images before booking.</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-pen-alt fa-3x"></i><br>You can register your hotel to the public.</td>
                            <td><i class="far fa-grin-stars fa-3x"></i><br>You can add rooms and images to you hotel.</td>
                        </tr>
                            <td><i class="far fa-clock fa-3x"></i><br>Updated time are immediately changed.</td>
                            <td><i class="fas fa-database fa-3x"></i><br>Rooms prices, number, capacity of hotel<br>can be viewed directly with out asking.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 text-center">
                <h3>OUR CUSTOMERS ARE OUR TOP PRIORITY.<br>
                    WE ARE FOCUSED ON YOUR SUCCESS!</h3>
                <hr>
            </div>
            <div class="col-12 text-center">
                <p style="color: #5cd08d; font-size: x-large;font-weight: bold;">
                    True experience is not a passive activity - It is
                    participatory, immersive and fun!
                </p>
            </div>
        </div>
    </div>
@stop

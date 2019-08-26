<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

# Aya's Routes
//models

# John's Routes
Route::get('/',function (){
    return view('home');
})->name('homepage');

Route::get('/hotels',function (){
    return view('hotels');
})->name('hotels');

Route::get('/login',function (){
    return view('login');
})->name('login');

Route::get('/register',function (){
    return view('registration');
})->name('registration');


# Nayra's Routes
Route::get('/list/{click_no}','SearchController@List');


# Yomna's Routes
Route::get('hotel','HotelController@registeration');
Route::post('hotel','HotelController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function (){
    return 'invalid request';
});



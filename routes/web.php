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


# Nayra's Routes
Route::get('/list/{click_no}','SearchController@List');


# Yomna's Routes
Route::put('profile','HotelController@update');
Route::get('profile1','HotelController@delete');
Route::get('profile2/{id}','HotelController@deleteroom');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function (){
    return 'invalid request';
});



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
Route::get('hotels/{username}/profile','HotelController@show')->name('profile');
Route::get('/hotels/{start?}', 'SearchController@Listing')->name('hotels');


# Nayra's Routes
Route::get('/hotels/{click_no}','SearchController@Listing');


# Yomna's Routes
Route::post('profile','HotelController@show');
Route::put('profile','HotelController@update');
Route::post('profile1','HotelController@delete');
Route::post('profile2','HotelController@deleteroom');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



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

Route::get('/test',function (){
    return view('test');
});

Route::get('/settings','HotelController@showAuth')
    ->name('settings')
    ->middleware('authenticated');
Route::delete('/settings','HotelController@delete')->middleware('authenticated');

Route::get('/settings/hotel_room','HotelController@showAuth')
    ->name('hotel_room')
    ->middleware('authenticated');
Route::post('/settings/hotel_room','HotelroomController@store')->middleware('authenticated');
Route::put('/settings/hotel_room','HotelroomController@update')->middleware('authenticated');
Route::delete('/settings/hotel_room','HotelroomController@delete')->middleware('authenticated');

Route::get('/settings/hotel_image','ImageController@listImages')
    ->name('hotel_image')
    ->middleware('authenticated');
Route::post('/settings/hotel_image','ImageController@store')->middleware('authenticated');
Route::put('/settings/hotel_image','ImageController@update')->middleware('authenticated');
Route::delete('/settings/hotel_image','ImageController@delete')->middleware('authenticated');

Route::get('/settings/password','HotelController@showAuth')
    ->name('passwordChange')
    ->middleware('authenticated');



# Nayra's Routes
Route::get('/listing/{start}/{query}/{by}','SearchController@Listing');
Route::put('/settings','HotelController@updateAbout')->middleware('authenticated');


# Yomna's Routes
Route::post('profile','HotelController@show');
Route::put('profile','HotelController@update');
Route::post('profile1','HotelController@delete');
Route::post('profile2','HotelController@deleteroom');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



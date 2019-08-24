<?php

use Illuminate\Support\Facades\Route;

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


# John's Routes
Route::get('/',function (){
    return view('home');
})->name('homepage');

Route::get('/hotels',function (){
    return 'none';
})->name('hotels');

Route::get('/login',function (){
    return 'none';
})->name('login');

Route::get('/register',function (){
    return 'none';
})->name('registration');


# Nayra's Routes


# Yomna's Routes




Route::fallback(function (){
    return 'invalid request';
});

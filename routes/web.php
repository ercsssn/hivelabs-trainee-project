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

Route::get('/', function () {
    return view('home');
});

// Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});

//RoomType Routes
Route::get('admin/roomtype/{id}/delete','RoomTypeController@destroy');
Route::resource('admin/roomtype',RoomTypeController::class);

//Room Routes
Route::get('admin/rooms/{id}/delete','RoomController@destroy');
Route::resource('admin/rooms',RoomController::class);
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

//Admin Login
Route::get('admin/login', 'AdminController@login');
Route::post('admin/login', 'AdminController@check_login');
Route::get('admin/logout', 'AdminController@logout');

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

//Tenant Routes
Route::get('admin/tenant/{id}/delete','TenantController@destroy');
Route::resource('admin/tenant',TenantController::class);

//Delete Image
Route::get('admin/roomtypeimage/delete/{id}','RoomTypeController@destroy_image');

//Department Routes
Route::get('admin/department/{id}/delete','EmployeeDepartmentController@destroy');
Route::resource('admin/department',EmployeeDepartmentController::class);

//Employee Payment
Route::get('admin/employee/payment/{id}/add','EmployeeController@add_payment');
Route::post('admin/employee/payment/{id}','EmployeeController@save_payment');

//Employee CRUD
Route::get('admin/employee/{id}/delete','EmployeeController@destroy');
Route::resource('admin/employee',EmployeeController::class);
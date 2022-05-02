<?php

use App\Events\NewRoomAddition;
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

Route::get('/', 'HomeController@home');
Route::get('service/{id}', 'HomeController@service_detail');
Route::get('about_us', 'PageController@about_us');
Route::get('faqs', 'PageController@faqs');

//Admin Login
Route::get('admin/login', 'AdminController@login');
Route::post('admin/login', 'AdminController@check_login');
Route::get('admin/logout', 'AdminController@logout');

// Admin Dashboard
Route::get('admin', 'AdminController@dashboard');

//Banner Routes
Route::get('admin/banner/{id}/delete','BannerController@destroy');
Route::resource('admin/banner',BannerController::class);

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
Route::get('admin/employee/payments/{id}','EmployeeController@all_payments');     
Route::get('admin/employee/payment/{id}/add','EmployeeController@add_payment');
Route::post('admin/employee/payment/{id}','EmployeeController@save_payment');
Route::get('admin/employee/payment/{id}/{employee_id}/delete','EmployeeController@delete_payment');

//Employee CRUD
Route::get('admin/employee/{id}/delete','EmployeeController@destroy');
Route::resource('admin/employee',EmployeeController::class);

//Rent
Route::get('admin/rent/{id}/delete','RentController@destroy');
Route::get('admin/rent/available_rooms/{check_in_date}','RentController@available_rooms');
Route::resource('admin/rent',RentController::class);

Route::get('login', 'TenantController@login');
Route::post('tenant/login', 'TenantController@tenant_login');
Route::get('register', 'TenantController@register');
Route::get('logout', 'TenantController@logout');

Route::get('rent', 'RentController@front_rent');
Route::get('rent/success', 'RentController@rent_payment_success');
Route::get('rent/fail', 'RentController@rent_payment_fail');

//Services CRUD
Route::get('admin/service/{id}/delete','ServiceController@destroy');
Route::resource('admin/service',ServiceController::class);

//Reviews
Route::get('tenant/add_review','HomeController@add_review');
Route::post('tenant/save_review','HomeController@save_review');
Route::get('admin/review/{id}/delete','AdminController@remove_review');
Route::get('admin/reviews','AdminController@reviews');
Route::post('save_msg','PageController@save_msg');


//Add New Room Event
Route::get('admin/rooms/event', function() {
    event(new NewRoomAddition('Room added'));
});


Route::get('admin/rooms/listen', function() {
    return view('listen');
});
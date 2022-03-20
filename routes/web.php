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


// Guest
Route::get('guestUser','GuestController@index');
Route::get('/guestUser/appointments/getDoctor/{did}', 'GuestController@findDoctors');
Route::post('/guestUser/appointments/store', 'GuestController@appointmentsStore');


// Patient 
Route::get('/','Auth\PatientLoginController@loginForm')->name('patient.login');
Route::post('/login', 'Auth\PatientLoginController@login')->name('patient.login.submit');
Route::get('patient/logout/', 'Auth\PatientLoginController@logout')->name('patient.logout');

Route::get('patient/appointments', 'PatientController@appointments')->name('patient.appointments');
Route::get('patient/appointments/create', 'PatientController@appointmentsCreate');
Route::get('patient/appointments/getDoctor/{did}', 'PatientController@findDoctors');
Route::post('patient/appointments/store', 'PatientController@appointmentsStore');


// Admin
Route::prefix('admin')->group(function() {
	
	Route::get('/','Auth\AdminLoginController@loginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
	
	Route::get('/doctors', 'AdminController@doctors');
	Route::get('/patients', 'AdminController@patients');
    Route::get('/appointments', 'AdminController@appointments')->name('admin.appointments');
    Route::get('/appointments/create', 'AdminController@appointmentsCreate');
    Route::get('/appointments/getDoctor/{did}', 'AdminController@findDoctors');
    Route::post('/appointments/store', 'AdminController@appointmentsStore');

	Route::get('pdf','AdminController@pdf');
	Route::post('/uploadpdf', 'AdminController@uploadpdf');
});


// Doctor
Route::prefix('doctor')->group(function() {
	
	Route::get('/','Auth\DoctorLoginController@loginForm')->name('doctor.login');
    Route::post('/login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');
    Route::get('logout/', 'Auth\DoctorLoginController@logout')->name('doctor.logout');
	
	Route::get('/appointments', 'DoctorController@appointments')->name('doctor.appointments');
	Route::post('/appointments/update', 'DoctorController@appointmentsUpdate')->name('appointments.update');
});
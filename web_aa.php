<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/appointment_list', function () {
    return view('appointment.appointment_list');
});*/


Route::group(['middleware' => 'auth'], function() {

	Route::resource('appointment','AppointmentController');

	Route::get('appointment_list','AppointmentController@appointment_list');

	Route::get('delete_appointment/{id}','AppointmentController@delete_appointment');

	Route::get('show_appointment','AppointmentController@show_appointment');

	Route::get('/appointment_booked/{date}','AppointmentController@appointment_booked');

	Route::get('calendar_event_list','AppointmentController@calendar_event_list');

});

Route::get('logout', 'Auth\LoginController@logout');


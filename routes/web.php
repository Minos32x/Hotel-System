<?php

use App\Http\Controllers\ManagersController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ClientsController;


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


Route::get('/', 'HomeController@country');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

// Temporary Routes To Test Mailing System
Route::get('/sendgreeting/{id}', 'MailsController@GreetingMail')->name('Mails.GreetingMail');
Route::get('/sendreminder/{id}', 'MailsController@ReminderMail')->name('Mails.ReminderMail');


Route::get('/admin', function () {
    return view('Admin.admin_template');
});
Route::get('/admin/index', function () {
    return view('Admin.index');
});
Route::get('/admin/index2', function () {
    return view('Admin.index2');
});


Route::prefix('employee')->group(function () {

    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->middleware('forbid-banned-user')->name('employee.login.submit');
    Route::get('/', 'EmployeeController@index')->middleware('forbid-banned-user')->name('employee.dashboard');
    Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');

});

Route::get('/admin/getManagers', 'ManagersController@index');
Route::get('/admin/getReceptionist', 'ReceptionistController@index');
Route::get('/admin/getClient', 'ClientsController@index');
Route::get('/rooms', 'RoomsController@index');

// Temporary Routes To Test Ban and Unban
Route::get('ban/{id}', 'EmployeeController@EmployeeBan')->name('employee.ban');
Route::get('unban/{id}', 'EmployeeController@Employeeunban')->name('employee.unban');





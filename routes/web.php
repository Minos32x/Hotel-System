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


Route::get('/', 'HomeController@country');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

// Temporary Routes To Test Mailing System
Route::get('/sendgreeting/{id}', 'MailsController@GreetingMail')->name('Mails.GreetingMail');
Route::get('/sendreminder/{id}', 'MailsController@ReminderMail')->name('Mails.ReminderMail');


Route::get('/admin', function () {
    return view('Admin.admin_template');
})->name('admin')->middleware('auth:employee');
Route::get('/admin/index', function () {
    return view('Admin.index');
});
Route::get('/admin/index2', function () {
    return view('Admin.index2');
});


Route::prefix('employee')->group(function () {

    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');

    Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
    Route::get('/', 'EmployeeController@index')->name('employee.dashboard')->middleware('guest:web');

    Route::post('/login', 'Auth\EmployeeLoginController@login')->middleware('forbid-banned-user')->name('employee.login.submit');
    Route::get('/', 'EmployeeController@index')->middleware('forbid-banned-user')->name('employee.dashboard');

    Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');

});


Route::get('/managers', 'ManagersController@index');
Route::get('/managers/create', 'ManagersController@create');
Route::post('/managers', 'ManagersController@store');
Route::get('/employees/{id}/edit', 'ManagersController@edit');
Route::PUT('/employees/{id}/update', 'ManagersController@update');
Route::DELETE('/employees/{id}', 'ManagersController@destroy');
Route::get('/receptionists/create', 'ReceptionistController@create');
Route::post('/receptionists', 'ReceptionistController@store');


Route::get('/receptionists', 'ReceptionistController@index');
Route::get('/clients', 'ClientsController@index');
Route::get('/rooms', 'roomController@index');
Route::get('/floors', 'FloorsController@index');


Route::get('/admin/getManagers', 'ManagersController@index');
Route::get('/admin/getReceptionist', 'ReceptionistController@index');
Route::get('/admin/getClient', 'ClientsController@index');
Route::get('/rooms', 'RoomsController@index');
Route::get('/reservations', 'ReservationsController@index')->name('manager.reservation');

// Temporary Routes To Test Ban and Unban
Route::get('ban/{id}', 'EmployeeController@EmployeeBan')->name('employee.ban');
Route::get('unban/{id}', 'EmployeeController@Employeeunban')->name('employee.unban');



Route::prefix('client')->group(function () {
    Route::get('/', 'ClientsController@home')->name('client.home');
    Route::get('/profile', 'ClientsController@profile')->name('client.profile');
    Route::get('/reservations', 'ClientsController@create')->name('client.reservation');
    Route::post('/reservations', 'ClientsController@ReservationStore')->name('client.reservation');
    Route::get('/show', 'ClientsController@index2')->name('client.show');
});





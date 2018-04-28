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





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@country');

Route::prefix('employee')->group(function () {
    Route::get('/', 'EmployeeController@index')->name('employee.dashboard')->middleware('guest:web');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->middleware('forbid-banned-user')->name('employee.login.submit');


    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login')->middleware('web');

});


Route::middleware('auth:employee')->group(function(){


    Route::get('/admin/index', function () {
        return view('Admin.index');
    });
    
    Route::get('/admin/index2', function () {
        return view('Admin.index2');
    });
    Route::get('/admin', function () {
        return view('Admin.admin_template');
    })->name('admin');

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
Route::get('/clients/{id}/edit', 'ClientsController@edit');
Route::PUT('/clients/{id}/update', 'ClientsController@update');
Route::DELETE('/clients/{id}', 'ClientsController@destroy');



Route::get('/rooms', 'RoomsController@index');
Route::get('/rooms/create', 'RoomsController@create');
Route::post('/rooms', 'RoomsController@store');
Route::get('/rooms/{id}/edit', 'RoomsController@edit');
Route::PUT('/rooms/{id}/update', 'RoomsController@update');
Route::delete('/rooms/{id}', 'RoomsController@destroy');


Route::get('/floors', 'FloorsController@index');
Route::get('/floors/create', 'FloorsController@create');
Route::post('/floors', 'FloorsController@store');
Route::get('/floors/{id}/edit', 'FloorsController@edit');
Route::PUT('/floors/{id}/update', 'FloorsController@update');
Route::DELETE('/floors/{id}', 'FloorsController@destroy');


Route::get('/admin/getManagers', 'ManagersController@index');
Route::get('/admin/getReceptionist', 'ReceptionistController@index');
Route::get('/admin/getClient', 'ClientsController@index');
Route::get('/reservations', 'ReservationsController@index')->name('manager.reservation');


Route::prefix('employee/blocking')->group(function () {

    Route::get('/ban/{id}', 'EmployeeController@EmployeeBan')->name('employee.ban');
    Route::get('unban/{id}', 'EmployeeController@Employeeunban')->name('employee.unban');
});

Route::get('client/ban/{id}', 'ClientsViewsController@ClientBan')->name('client.ban');
Route::get('client/unban/{id}', 'ClientsViewsController@Clientunban')->name('client.unban');
});

Route::middleware('auth:web')->group(function(){

Route::prefix('client')->group(function () {
    Route::get('/', 'ClientsViewsController@index')->name('client.index');
    Route::get('/profile', 'ClientsViewsController@profile')->name('client.profile');
    Route::get('/reservations', 'ClientsViewsController@showRooms')->name('client.reservation');
    Route::get('/reservations/{id}/room', 'ClientsViewsController@create')->name('client.create');
    Route::post('/reservations/{id}/room', 'ClientsViewsController@showPayment')->name('client.show_payment');
    Route::post('/payment/{id}/room', 'ClientsViewsController@confirm')->name('client.confirm');
    Route::get('/show', 'ClientsViewsController@showReserved')->name('client.show');
    Route::get('/editProfile/{id}', 'ClientsViewsController@edit')->name('client.edit_profile');
    Route::put('/editProfile/update/{id}', 'ClientsViewsController@update')->name('client.edit_profile_update');
    Route::delete('/delete/{id}','ReservationsController@delete')->name('client.reservation_delete');
    Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

});
Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');
});
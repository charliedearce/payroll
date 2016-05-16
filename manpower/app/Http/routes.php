<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/home/infos','CompanyInfos@infos');
Route::get('/home/tax','CompanyInfos@htax');
Route::get('/home/employees','EmployeeController@employees');
Route::post('/home/employees/save','EmployeeController@saveEmployees');
Route::get('/home/employees/deletePhoto','EmployeeController@deletePhoto');
Route::get('/home/addEmployee','EmployeeController@addEmployees');
Route::get('/home/editEmployee/{emdid}', 'EmployeeController@editEmployee');
Route::post('/home/updateEmployee/{emdid}','EmployeeController@updateEmployee');
Route::get('/home/deleteEmployee/{emdid}','EmployeeController@deleteEmployee');
Route::get('/home/employeeSchedule/{emdid}','EmployeeController@EmployeeSchedule');
Route::post('/home/deleteSchedule/delete','EmployeeController@deleteSchedule');
Route::post('/home/addSchedule/{day}','EmployeeController@addSchedule');
Route::get('/home/employees/search','EmployeeController@searchEmployee');
Route::get('/home/imageEmployee/{filename}', [
	'uses' => 'EmployeeController@getImage',
	'as' => 'employee.image']);
});

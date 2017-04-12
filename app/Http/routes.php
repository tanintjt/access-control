<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('welcome', function () {
    return view('welcome');
});


/*Route::any('inactive-user', [
    'as' => 'inactive-user',
    'uses' => 'UserController@postLogin'
]);*/

/*reset password route for first-time login */
/*Route::any('reset-password/{user_id}', [
    'as' => 'reset-password',
    'uses' => 'Auth\AuthController@reset_password'
]);

Route::any('update-new-password', [
    'as' => 'update-new-password',
    'uses' => 'Auth\AuthController@update_new_password'
]);*/

/*Route::any('new-user-dashboard', [
    'as' => 'new-user-dashboard',
    'uses' => 'HomeController@dashboard'
]);*/


Route::get('get-user-login', [
    'as' => 'get-user-login',
    'uses' => 'Auth\AuthController@getLogin'
]);


Route::any('post-user-login', [
    'as' => 'post-user-login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::any('attendance', [
    'as' => 'attendance',
    'uses' => 'AccessControlController@attendance'
]);

/*------------------------------------- department ------------------------------------------*/

Route::any('department', [
    'as' => 'department',
    'uses' => 'AccessControlController@department'
]);


Route::any('add-department', [
    'as' => 'add-department',
    'uses' => 'AccessControlController@storeDept'
]);


Route::any('edit-department/{id}', [
    'as' => 'edit-department',
    'uses' => 'AccessControlController@editDept'
]);

Route::any('update-department/{dept_id}', [
    'as' => 'update-department',
    'uses' => 'AccessControlController@update'
]);

/*------------------------------------- designation ------------------------------------------*/

Route::any('designation', [
    'as' => 'designation',
    'uses' => 'AccessControlController@designation'
]);


Route::any('add-designation', [
    'as' => 'add-designation',
    'uses' => 'AccessControlController@storeDeg'
]);


Route::any('edit-designation/{id}', [
    'as' => 'edit-designation',
    'uses' => 'AccessControlController@editDeg'
]);

Route::any('update-designation/{dept_id}', [
    'as' => 'update-designation',
    'uses' => 'AccessControlController@updateDeg'
]);


/*------------------------------------- gov_holidays ------------------------------------------  */

Route::any('gov_holidays', [
    'as' => 'gov_holidays',
    'uses' => 'AccessControlController@gov_holidays'
]);


Route::any('add-holidays', [
    'as' => 'add-holidays',
    'uses' => 'AccessControlController@gov_holidays_store'
]);


Route::any('edit-holidays/{id}', [
    'as' => 'edit-holidays',
    'uses' => 'AccessControlController@gov_holidays_edit'
]);

Route::any('update-holidays/{dept_id}', [
    'as' => 'update-holidays',
    'uses' => 'AccessControlController@gov_holidays_update'
]);

/*---------------------------- Employee Data ---------------------------------------------*/


Route::any('employee', [
    'as' => 'employee',
    'uses' => 'AccessControlController@employee'
]);


Route::any('add-employee', [
    'as' => 'add-employee',
    'uses' => 'AccessControlController@employee_store'
]);


Route::any('edit-employee/{id}', [
    'as' => 'edit-employee',
    'uses' => 'AccessControlController@employee_edit'
]);

Route::any('update-employee/{dept_id}', [
    'as' => 'update-employee',
    'uses' => 'AccessControlController@employee_update'
]);



/*Route::group(['middleware' => 'auth'], function()
{
*/


/*Route::any('/', [
    'as' => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);*/

Route::any('dashboard', [
    'as' => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);


Route::any('logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@logout'
]);

Route::any('all_routes_uri', [
    'as' => 'all_routes_uri',
    'uses' => 'HomeController@all_routes_uri'
]);

/*});*/


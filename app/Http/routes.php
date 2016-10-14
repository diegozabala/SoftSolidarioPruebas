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


Route::get('/', function () {
    return view('login');
});

Route::get('home', function () {
    return view('home');
});


*/

Route::get('login','Auth\AuthController@getLogin');
Route::post('login',['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout',['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

//Registrar Routes
Route::get('register','Auth\AuthController@getRegister');
Route::post('register',['as' => 'auth\register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');

/*
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::resource('organizaciones', 'OrganizacionesController');
        Route::get('organizaciones/{id}/destroy', ['uses' => 'OrganizacionesController@destroy', 'as' => 'admin.organizaciones.destroy']);

    });
*/
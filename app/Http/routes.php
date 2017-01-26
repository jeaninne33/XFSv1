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
Route::get('/','IndexController@index');
// Route::get('login',function(){
//   return view('auth/login');
// });
Route::get('servicios',function(){
  return view('servicios');
});

Route::get('principal',function(){
  return view('principal');
});
=======

Route::get('principal', [
    'as' => 'principal',
    'uses' => 'AdminController@index'
]);
>>>>>>> 941e6d943e523516d75b980e48757fb2c5d8f29d
Route::get('welcome', [
    'as' => 'welcome',
    'uses' => 'HomeController@index'
]);
Route::get('pdf', 'HomeController@invoice');

//Authentication routes...
Route::get('login', [
  'uses'=> 'Auth\AuthController@getLogin',
   'as' => 'login'
]);
Route::get('login2',function(){
  return view('auth/login2');
});
//Route::resource('loginPost','LoginController');
Route::post('login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('register',  [
  'uses'=> 'Auth\AuthController@getRegister',
   'as' => 'register'
]);

Route::resource('companys', 'CompanyController');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

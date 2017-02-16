<?php
use XFS\Estado;
use XFS\Company;
use XFS\Pais;
use XFS\Servicio;
use Illuminate\Support\Facades\DB;
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

Route::get('servicios',function(){
  return view('servicios');
});



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
//Route::resource('loginPost','LoginController');
Route::post('login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('register',  [
  'uses'=> 'Auth\AuthController@getRegister',
   'as' => 'register'
]);

Route::get('/state/{id}',function($id){
  $estados=Estado::where('pais_id',$id)->get();
  return Response::json($estados);
});
Route::get('/services/{id}',function($id){
$servicio=Servicio::where('id',$id)->get();
return Response::json($servicio);
});
//consulta para traer si son clientes o proveedores
Route::get('/clientes/{id}',function($id){
  if ($id==1) {
  $tipo='client';
  }
  else {
  $tipo='prove';
  }
  $companys = DB::table('companys')
  ->join('paises', 'companys.pais_id', '=', 'paises.id')
  ->select('companys.id', 'companys.nombre',  'companys.telefono','companys.celular','paises.nombre as pais','companys.tipo')
  ->where('tipo',$tipo)
  ->get();
  return Response::json($companys);
});

 Route::get('estimates/cliente','EstimatesController@cliente');
 Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

// Route::get('estimate','EstimatesController@cliente');
/*Rutas privadas solo para usuarios autenticados*/
Route::group(['middleware' => 'auth'], function()
{
  Route::get('principal', [
      'as' => 'principal',
      'uses' => 'AdminController@index'
  ]);
  Route::resource('companys', 'CompanyController');
  Route::resource ('estimates','EstimatesController');
  Route::resource('servicios', 'ServicioController');
  Route::resource ('categoria', 'CategoriaController');
  Route::resource ('contratos','ContratoController');
  Route::get('/home',function(){
    return view('layouts.home');
  });
});

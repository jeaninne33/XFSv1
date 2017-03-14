<?php
use XFS\Estado;
use XFS\Company;
use XFS\Pais;
use XFS\Servicio;
use XFS\Avion;
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
/*Route::get('/comp/{tip}',function($tip){
/*  if($tip=="todos"){
   $companys =  Company::all();
 }else{
   $companys=Company::where('tipo',$tip)->get();

  //return Response::json($companys);
    return view('companys.partials.table', compact('tip'));

});*/

/*Route::get('/table/{data}',function(){
  $companys=json_decode(data);
  return view('companys.partials.table', compact('companys'));
});*/
Route::get('/services/{id}',function($id){
  $servicio=Servicio::where('id',$id)->get();
  return Response::json($servicio);
});
Route::get('/changeAvion/{id}',function($id){
  $avion=Avion::where('id',$id)->get();
  return Response::json($avion);
});
Route::get('/listAvion/{id}',function($id){
  $avion=Avion::where('company_id',$id)->get();
  return Response::json($avion);
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
    ->select('companys.id', 'companys.nombre',
    'paises.nombre as pais','celular','telefono',
    'correo','tipo','categoria')
    ->where('tipo',$tipo)
    ->get();
    return Response::json($companys);
});

 Route::get('estimates/cliente','EstimatesController@cliente');
 Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::resource('mail','MailController');
// Route::get('estimate','EstimatesController@cliente');
/*Rutas privadas solo para usuarios autenticados*/
Route::group(['middleware' => 'auth'], function()
{
  Route::get('principal', [
      'as' => 'principal',
      'uses' => 'AdminController@index'
  ]);
    Route::resource('invoices', 'InvoiceController');
  Route::resource('companys', 'CompanyController');
  Route::resource ('estimates','EstimatesController');
  Route::resource ('invoices','InvoiceController');
  Route::resource('servicios', 'ServicioController');
  Route::resource ('categoria', 'CategoriaController');
  Route::resource ('contratos','ContratoController');
  Route::get('invoices/create/{invoices}', [ 'as'=>'invoices.create','uses' => 'InvoiceController@create']);
  Route::get('invoices_pdf/{invoices}', [ 'as'=>'invoices.pdf','uses' => 'InvoiceController@print_invoice']);
  Route::post('avion/{avion}', [ 'as'=>'avion.destroy','uses' => 'CompanyController@avion_destroy']);
});

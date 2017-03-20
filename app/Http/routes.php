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

 //Route::get('estimates/cliente','EstimatesController@cliente');
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
  Route::get('reports', [  'as' => 'reports','uses' => 'AdminController@index_reports'  ]);

  Route::get('relation', [  'as' => 'relacion','uses' => 'AdminController@reports_relacion'  ]);
  Route::post('relation', [ 'as'=>'relacion','uses' => 'AdminController@generate_relacion']);
  Route::get('invoice', [  'as' => 'invoice','uses' => 'AdminController@reports_invoice'  ]);
  Route::post('invoice', [  'as' => 'invoice','uses' => 'AdminController@pdf_invoice'  ]);
  Route::get('estimate', [  'as' => 'estimate','uses' => 'AdminController@reports_estimate'  ]);

  Route::post('estimate', [  'as' => 'estimate','uses' => 'AdminController@pdf_estimate'  ]);
  Route::get('servicios_pdf', [ 'as'=>'servicios.pdf','uses' => 'AdminController@pdf_servicios']);
  Route::get('company', [  'as' => 'company','uses' => 'AdminController@reports_company'  ]);
  Route::post('company', [  'as' => 'company','uses' => 'AdminController@pdf_company'  ]);
  Route::resource('invoices', 'InvoiceController');
  Route::resource('users', 'Auth\AuthController');
  Route::resource('companys', 'CompanyController');
  Route::resource ('estimates','EstimatesController');
  Route::resource ('invoices','InvoiceController');
  Route::resource('servicios', 'ServicioController');
  Route::resource ('categoria', 'CategoriaController');
  Route::resource ('contratos','ContratoController');
  Route::get('invoices/create/{invoices}', [ 'as'=>'invoices.create','uses' => 'InvoiceController@create']);
  Route::get('invoices_pdf/{invoices}', [ 'as'=>'invoices.pdf','uses' => 'InvoiceController@print_invoice']);
  Route::get('fuel-release', [ 'as'=>'fuel-release.pdf','uses' => 'EstimatesController@FuelRelease']);
  Route::post('avion/{avion}', [ 'as'=>'avion.destroy','uses' => 'CompanyController@avion_destroy']);
});

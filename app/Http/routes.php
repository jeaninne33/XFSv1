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

//Authentication routes...
Route::get('login', ['as' => 'login','uses'=> 'Auth\AuthController@getLogin']);
Route::post('login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

//Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
// Route::get('register',  [
//   'uses'=> 'Auth\AuthController@getRegister',
//    'as' => 'register'
// ]);

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
 //rutas solo admin
 Route::group(['middleware' => 'admin'], function()
{
      Route::resource('users', 'UserController');
});
/*Rutas privadas solo para usuarios autenticados*//////////////rutas para todos los usuarios
Route::group(['middleware' => 'auth'], function()
{
    //rutas estimado
    Route::get('printestimates/{id}', [ 'as'=>'printestimates','uses' => 'EstimatesController@printestimate']);
    Route::get('fuel-release', [ 'as'=>'fuel-release','uses' => 'EstimatesController@fuelrelease']);
    Route::post('fuel-release', [ 'as'=>'fuel-release','uses' => 'EstimatesController@postfuelrelease']);
    Route::resource ('estimates','EstimatesController');
    Route::get('fuel-release/{id}/{ref}/{releaseRef}/{handling}/{intoPlane}/{phone}/{operator}/{fightNumber}/{eta}/{etd}/{fp}', [ 'as'=>'fuel-release','uses' => 'EstimatesController@fuelrelease']);
    Route::get('principal', ['as' => 'principal',  'uses' => 'AdminController@index']);
    Route::resource('mail','MailController');
    Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
    Route::post('adjuntar', 'MailController@store');
    Route::get('fuelreleases/{id}','EstimatesController@fuelreleaseview');
    Route::resource('mail','MailController');
    Route::get('perfil/{user}', [  'as' => 'perfil','uses' => 'UserController@perfil_user'  ]);
    Route::resource ('contratos','ContratoController');
});
/////////////////////rutas admin y contador
Route::group(['middleware' => 'admin_contador'], function()
{
    //rutas reportes
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
    //modulos
    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices/create/{invoices}', [ 'as'=>'invoices.create','uses' => 'InvoiceController@create']);
    Route::get('invoices_pdf/{invoices}', [ 'as'=>'invoices.pdf','uses' => 'InvoiceController@print_invoice']);
    Route::resource('companys', 'CompanyController');
    Route::post('avion/{avion}', [ 'as'=>'avion.destroy','uses' => 'CompanyController@avion_destroy']);
    Route::resource('servicios', 'ServicioController');
    Route::resource ('categoria', 'CategoriaController');
});

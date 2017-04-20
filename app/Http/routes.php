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

Route::get('/state/{id}',function($id){
  $estados=Estado::where('pais_id',$id)->get();
  return Response::json($estados);
});

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
     $tipo="tipo='client'";
    }
    else {
     $tipo="tipo='prove' or tipo='cp'";
    }
     $companys =DB::select(
     DB::raw("SELECT
       a.id,
       a.nombre,
       s.nombre as pais,
       celular,
       telefono_admin as telefono,
       correo,
       tipo,
       categoria
       FROM companys a
       INNER JOIN paises s ON s.id=a.pais_id
       WHERE $tipo "));
      // DB::table('companys')
    // ->join('paises', 'companys.pais_id', '=', 'paises.id')
    // ->select('companys.id', 'companys.nombre',
    // 'paises.nombre as pais','celular','telefono_admin as telefono',
    // 'correo','tipo','categoria')
    // ->where('tipo',$tipo)
    // ->get();
    return Response::json($companys);
});

//Authentication routes...
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('login', ['as' => 'login','uses'=> 'Auth\AuthController@getLogin']);
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Route::get('estimate','EstimatesController@cliente');
//rutas solo admin
Route::group(['middleware' => 'admin'], function()
{
    Route::resource('users', 'UserController');
});
/*Rutas privadas solo para usuarios autenticados*//////////////rutas para todos los usuarios
  Route::group(['middleware' => 'auth'], function()
  {
     //rutas estimado
      Route::resource ('estimates','EstimatesController');
      Route::get('printestimates/{id}', [ 'as'=>'printestimates','uses' => 'EstimatesController@printestimate']);
      Route::post('item/{item}', [ 'as'=>'item.destroy','uses' => 'EstimatesController@item_destroy']);
      Route::post('image', [ 'as'=>'image.store','uses' => 'EstimatesController@save_image']);
      Route::get('principal', ['as' => 'principal',  'uses' => 'AdminController@index']);
      Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
      Route::get('perfil/{user}', [  'as' => 'perfil','uses' => 'UserController@perfil_user'  ]);
      Route::resource ('contratos','ContratoController');
      Route::post('adjuntar', 'MailController@store');
    //  Route::resource('mail','MailController');
      Route::get('capture/{archivo}', function ($archivo) {
           $public_path = public_path();
           $url = $public_path.'/capture/'.$archivo;
           //verificamos si el archivo existe y lo retornamos
           if (Storage::exists($archivo))
           {
             return response()->download($url);
           }
           //si no se encuentra lanzamos un error 404.
           abort(404);
      });
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
  Route::resource('invoices', 'InvoiceController');
  Route::post('send_invoice', [  'as' => 'send_invoice','uses' => 'InvoiceController@send_invoice'  ]);
  Route::get('invoices/create/{invoices}', [ 'as'=>'invoices.create','uses' => 'InvoiceController@create']);
  Route::get('invoices_pdf/{invoices}', [ 'as'=>'invoices.pdf','uses' => 'InvoiceController@print_invoice']);
  Route::resource('companys', 'CompanyController');
  Route::post('avion/{avion}', [ 'as'=>'avion.destroy','uses' => 'CompanyController@avion_destroy']);
  Route::resource('servicios', 'ServicioController');
  Route::resource ('categoria', 'CategoriaController');
  Route::resource ('fuelreleases','FuelreleaseController');
  Route::get('fuelreleases/create/{fuelreleases}', [ 'as'=>'fuelreleases.create','uses' => 'FuelreleaseController@create']);
  Route::get('printfuelreleases/{fuelreleases}', [ 'as'=>'printfuelreleases.pdf','uses' => 'FuelreleaseController@print_fuel']);

});

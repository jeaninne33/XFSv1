<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Http\Requests\CrearCompanysRequest;
use XFS\Http\Requests\editarCompanysRequest;
use XFS\Company;
use XFS\Pais;
use XFS\Avion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function _construc(){

        //$this->beforeFilter('@finCompanys',['only'=>['show','edit','update','destroy']]);
    //  $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }

  /*   public function find(Route $route){
        $this->company =Company::findOrFail($route->getParameter('companys'));
    }*/

    public function index(Request $request)
    {

          $companys =  Company::all();
      // return response()->json( $companys->toArray());
      return view('companys.index',['companys'=>$companys]);
        //  return response(view('companys.index',array('companys'=>$companys)),200, ['Content-Type' => 'application/json']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  // load the create form (app/views/nerds/create.blade.php)

        $paises = Pais::lists('nombre','id');
        $paises->prepend('Seleccione el País');
        return view('companys.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    //CrearCompanys
    //Request $request
   public function store(CrearCompanysRequest $request)
   {
     $data  = $request->all();
     $band=true;
     $airplane=false;
     $aviones=$data["aviones"];
     $error= array();
     if(!empty($aviones)){
         $error=Company::validate_air($aviones);
         if(!empty($error)){
             $band=false;
         }else{
           $airplane=true;
         }
    }//fin si hay aviones
    if($band){
      DB::beginTransaction();
      try {
          $company=Company::create($data);
          if($airplane){
            foreach( $aviones as $indice =>$air ){
             $avion=Company::add_airplane($air);
             $company->aviones()->save($avion);
           }//fin para
         }//fin si hay aviones
         } catch (Exception $e) {
            DB::rollback();
            $error[]=[$e->getMessage()];
         }
         // Hacemos los cambios permanentes ya que no han habido errores
         DB::commit();
         $result=['message' => 'bien', 'error'=> $error];
    }else{
      $result=['message' => 'mal','error'=> $error];
    }//fin si band
    return response()->json($result);
   }//fin store
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $companys = Company::findOrFail($id);
        // load the view and pass the nerds
        // show the view and pass the nerd to it
         return view('companys.show')->with('companys', $companys);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $companys = Company::findOrFail($id);
      $paises = Pais::lists('nombre','id');
       // show the edit form and pass the nerd
      return view('companys.edit', compact('paises'))->with('companys',$companys);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editarCompanysRequest $request, $id)
    {
      $company= Company::findOrFail($id);
      $data  = $request->all();
      $band=true;
      $airplane=false;
      $aviones=$data["aviones"];
      $error= array();
      if(!empty($aviones)){
      //print_r($json);
          $error=Company::validate_air($aviones);
          if(!empty($error)){
              $band=false;
          }else{
            $airplane=true;
          }
     }//fin si hay aviones
     if($band){
       DB::beginTransaction();
       try {
           $company->fill($request->all());
           $company->save();
           if($airplane){
             foreach( $aviones as $indice =>$air ){
                 if(isset($air["id"])){//si ya existe el avion en bd
                   $avion=Company::update_airplane($air);
                 }else{
                   $avion=Company::add_airplane($air);
                 }

              $company->aviones()->save($avion);
            }//fin para
          }//fin si hay aviones
          } catch (Exception $e) {
             DB::rollback();
             $error[]=[$e->getMessage()];
          }
          // Hacemos los cambios permanentes ya que no han habido errores
          DB::commit();
          $result=['message' => 'bien', 'error'=> $error];
     }else{
       $result=['message' => 'mal','error'=> $error];
     }//fin si band
     return response()->json($result);
      /* return redirect()->route('companys.index')
                       ->with('success','Compañia Actualizada Exitosamente');*/
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
     //  dd($id);
       // abort(500);
        $comp=Company::findOrFail($id);

        $mensaje='La compañia <b>'.$comp->nombre.'</b> fue eliminada Exitosamente';
        if (!is_null($comp)) {
            $comp->delete();
           // Session::flash('message', 'Successfully delete nerd!');

            if($request->ajax()){
                return $mensaje;

            }
           return redirect()->route('companys.index')
                 ->with('success', $mensaje);
       }


      //return $affectedRows;
    }

    public function avion_destroy($id_air, Request $request)
    {
        $air=Avion::findOrFail($id_air);
      //  $air=Avion::where('company_id', $id)->where('id', $id_air )->get();
        $mensaje='El Avion '.$air->tipo.' fue eliminado Exitosamente';
        if (!is_null($air)) {
            $air->delete();
            $result=['message' => $mensaje];
            return response()->json($result);
       }

      //return $affectedRows;
    }
}

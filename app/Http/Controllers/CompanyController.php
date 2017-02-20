<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use XFS\Http\Requests\CrearCompanysRequest;
use XFS\Http\Requests\editarCompanysRequest;
use XFS\Company;
use XFS\Pais;
use XFS\Avion;
use Illuminate\Http\Request;
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
      //  $this->middleware('auth');
    }

  /*   public function finCompanys(Route $route){
        $this->companys =Company::findOrFail($route->getParameter('companys'));
        dd($this->companys);

    }*/

    public function index(Request $request)
    {

          $companys =  Company::all();
          //orderBy('id','DESC');
      //  return  response()->view('companys.index')->json($companys);
        //->with('companys', $companys);
      /*  return response($companys);*/
      /*  return $companys;
      return response() ->view('companys.index')
            ->json($companys);*/
    //  return response()->json(  $companys);
      return response( $companys);
      //return view('companys.index',['companys'=>$companys]);
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
   //  print_r($data);
   //dd($data);
     //  Company::create($data);
     $band=true;
     $airplane=false;
     $aviones=$data["aviones"];
     if(!empty($aviones)){
     //print_r($json);
         $error= array();
        foreach ($aviones as $indice =>$array ) {
          $i=$indice+1;
           if((isset($array["tipo"]) && empty($array["tipo"])) || !isset($array["tipo"])){
             $error["tipo"]=["El campo Tipo de Avion #".$i." es Obligatorio"];
           }
            if ((isset($array["matricula"]) && empty($array["matricula"])) || !isset($array["matricula"])) {
              $error["matricula"]=["El campo Matricula de Avion #".$i." es Obligatorio"];
            }else{
              if(!empty(Avion::where('matricula' , $array["matricula"])->count())){
                 $error["mdupli"]=["Ya existe la matricula del Avion#".$i." en la Base de Datos"];
              }
            }
            if ((isset($array["licencia1"]) && empty($array["licencia1"])) || !isset($array["licencia1"])) {
               $error["licencia1"]=["El campo Licencia 1 de Avion #".$i." es Obligatorio"];
           }else{
             if(!empty(Avion::where('licencia1' , $array["licencia1"])->count())){
                $error["lidupli"]=["Ya existe la licencia1 del Avion#".$i." en la Base de Datos"];
             }
           }
            if ((isset($array["piloto1"]) && empty($array["piloto1"])) || !isset($array["piloto1"])) {
              $error["piloto1"]=["El campo Piloto1 de Avion #".$i." es Obligatorio"];
            }
            if (isset($array["certificado"])) {
              if(!empty(Avion::where('certificado' , $array["certificado"])->count())){
                 $error["cerdupli"]=["Ya existe la certificado del Avion#".$i." en la Base de Datos"];
              }
            }
         }//fin foreach
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
             $avion=New Avion;
             $avion->tipo=$air['tipo'];
             $avion->matricula=$air['matricula'];
             $avion->licencia1=$air['licencia1'];
             $avion->piloto1=$air['piloto1'];
             if(isset($air["modelo"])){
                 $avion->modelo=$air['modelo'];
             }
             if(isset($air["fabricante"])){
                 $avion->fabricante=$air['fabricante'];
             }
             if(isset($air["nombre"])){
                 $avion->nombre=$air['nombre'];
             }
             if(isset($air["licencia2"])){
                 $avion->licencia2=$air['licencia2'];
             }
             if(isset($air["piloto2"])){
                 $avion->piloto2=$air['piloto2'];
             }
             if(isset($air["certificado"])){
                 $avion->certificado=$air['certificado'];
             }
             if(isset($air["seguro"])){
                 $avion->seguro=$air['seguro'];
             }
             if(isset($air["registro"])){
                 $avion->registro=$air['registro'];
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
   //datos['message' => 'Compañia Agregada Exitosamente']
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
    public function update(CrearCompanysRequest $request, $id)
    {

      $company= Company::findOrFail($id);

      $company->fill($request->all());
      $company->save();
      // Session::flash('message', 'Successfully update nerd!');
       return redirect()->route('companys.index')
                       ->with('success','Compañia Actualizada Exitosamente');
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
}

<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use XFS\Http\Requests\CrearCompanysRequest;
use XFS\Http\Requests\editarCompanysRequest;
use XFS\Company;
use XFS\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /*  public function _construc(){

        $this->beforeFilter('@finCompanys',['only'=>['show','edit','update','destroy']]);
    }

    public function finCompanys(Route $route){
        $this->companys =Company::findOrFail($route->getParameter('companys'));
        dd($this->companys);

    }*/

    public function index(Request $request)
    {

          $companys = Company::all();//orderBy('id','DESC');
          return  view('companys.index')
        ->with('companys', $companys);

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
     print_r($data);
     dd("aloo");
      //if($request->ajax()){

          Company::create($data);
           //

           return response()->json(['message' => 'Compañia Agregada Exitosamente']);
           //return redirect()->route('companys.index')->with('success','Compañia Agregada Exitosamente');
	    //}
        //dd(Input::all());
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
        //  //
        // get the nerd
      $companys = Company::findOrFail($id);
      $paises = Pais::lists('nombre','id');
      $paises->prepend(' Seleccione el País');

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
    /*  $this->validate($request, [
        'nombre'       => 'required',
        'correo' => 'required',
        'direccion'      => 'required',
        'representante'=> 'required',
        'telefono'=> 'required|numeric',
        ]);
      */
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

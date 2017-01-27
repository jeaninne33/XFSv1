<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Requests\CrearCompanysRequest;
use XFS\Http\Controllers\Controller;
use XFS\Company;

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
      // dd($request->get('busqueda'));
        // get all the nerds
       /* $companys = Company::busqueda($request->get('busqueda'))->tipo($request->get('relacion'))->orderBy('id','DESC')->paginate(5);

        // load the view and pass the nerds
        return view('companys.index',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
        //return view('principal',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);*/
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
        return view('companys.create');
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
   public function store(Request $request)
   {
       // validate
       $this->validate($request, [
         'nombre'       => 'required|unique:companys,nombre',
         'correo' => 'required|email|unique:companys,correo',
         'direccion'      => 'required',
         'representante'=> 'required',
         'telefono'=> 'required|numeric',
         ]);
        Company::create($request->all());
         //
        // Session::flash('message', 'Successfully created nerd!');
         return redirect()->route('companys.index')->with('success','Compañia Agregada Exitosamente');
        //dd(Input::all());
   }



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

       // show the edit form and pass the nerd
      return view('companys.edit')->with('companys',$companys);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nombre'       => 'required',
        'correo' => 'required',
        'direccion'      => 'required',
        'representante'=> 'required',
        'telefono'=> 'required|numeric',
        ]);

      $this->companys->update($request->all());
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

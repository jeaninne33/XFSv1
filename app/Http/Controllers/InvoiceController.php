<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Company;
use XFS\Invoice;
use XFS\Pais;
use XFS\Avion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {

      $invoices =  invoice::with('company')->get();

      return view('invoices.index', compact('invoices'));

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  // load the create form (app/views/nerds/create.blade.php)

      /*  $paises = Pais::lists('nombre','id');
        $paises->prepend('Seleccione el País');
        return view('companys.create', compact('paises'));*/
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
        /*$companys = Company::findOrFail($id);
        // load the view and pass the nerds
        // show the view and pass the nerd to it
         return view('companys.show')->with('companys', $companys);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
      /*  $comp=Company::findOrFail($id);

        $mensaje='La compañia <b>'.$comp->nombre.'</b> fue eliminada Exitosamente';
        if (!is_null($comp)) {
            $comp->delete();
           // Session::flash('message', 'Successfully delete nerd!');

            if($request->ajax()){
                return $mensaje;

            }
           return redirect()->route('companys.index')
                 ->with('success', $mensaje);
       }*/
    }

}

<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Requests\CrearCompanysRequest;
use XFS\Http\Controllers\Controller;
use XFS\Company;

use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get all the nerds
        $companys = Company::all();

        // load the view and pass the nerds
         return view('companys.index')->with('companys', $companys);
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
    // public function store(Request $request)
    // {
    //     //
    // }
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
         'telefono'=> 'required|numeric|max:12',
         ]);
        $company=Company::create($request->all());
         //
         return redirect()->route('companys.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

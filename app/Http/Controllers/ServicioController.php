<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Servicio;
use XFS\Categoria;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $servicios = Servicio::busqueda($request->get('busqueda'))->tipo($request->get('relacion'))->orderBy('id','DESC')->paginate(5);

      // load the view and pass the nerds
      return view('servicios.index',compact('servicios'))->with('i', ($request->input('page', 1) - 1) * 5);
      //return view('principal',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorias=Categoria::Lists('nombre','id');
      return view('servicios.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nombre'       => 'required,nombre',
        'descripcion' => 'required',
        'categoria_id'  => 'required',
        ]);
       Company::create($request->all());
        //
       // Session::flash('message', 'Successfully created nerd!');
        return redirect()->route('servicios.index')->with('success','Servicio Agregada Exitosamente');
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
        $servicios=Servicio::find($id);
        return view('servicios.show')->with('servicios', $servicios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios=Servicio::findOrFail($id);
        return view('servicios.edit')->with('servicios', $servicios);
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
        'descripcion' => 'required',
        'categoria_id'      => 'required',

        ]);

       Servicio::find($id)->update($request->all());
      // Session::flash('message', 'Successfully update nerd!');
       return redirect()->route('servicios.index')
                       ->with('success','Servicio Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Servicio::find($id)->delete();
      //Session::flash('message', 'Successfully delete nerd!');
      return redirect()->route('servicios.index')
                    ->with('success','Servicio eliminado Exitosamente');
    }
}

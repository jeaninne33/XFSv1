<?php

namespace XFS\Http\Controllers;


use XFS\Servicio;
use XFS\Categoria;
use DB;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;
use XFS\Http\Requests\createSevicesRequest;
use XFS\Http\Requests\EditSevicesRequest;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    $servicio = Servicio::with('categoria')->get();

      return view('servicios.index')->with('servicio',$servicio);
      //return view('principal',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categorias = Categoria::Lists('nombre','id');
      return view('servicios.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createSevicesRequest $request)
    {

     $servicio = Servicio::create($request->all());
     $servicio->save();
     // Session::flash('message', 'Successfully created nerd!');
      return redirect()->route('servicios.index')->with('success','Servicio Agregada Exitosamente');
     //dd(Input::all());*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios=Servicio::findOrFail($id);
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
      $categorias=Categoria::Lists('nombre','id');
      return view('servicios.edit',compact('categorias'))->with('servicios', $servicios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSevicesRequest $request, $id)
    {

        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();
       return redirect()->route('servicios.index')
                       ->with('success','Servicio Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
      $servicio=Servicio::findOrFail($id);

              $mensaje='El Servicio <b>'.$servicio->nombre.'</b> fue eliminado Exitosamente';
              if (!is_null($servicio)) {
                  $servicio->delete();
                 // Session::flash('message', 'Successfully delete nerd!');

                  if($request->ajax()){
                      return $mensaje;

                  }
                 return redirect()->route('servicios.index')
                       ->with('success', $mensaje);
             }

      //Session::flash('message', 'Successfully delete nerd!');

     }
}
